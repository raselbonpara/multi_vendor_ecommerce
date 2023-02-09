<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetails;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $addToCart = new Cart();
        $addToCart->user_id = auth()->user()->id;
        $addToCart->vendor_id = $request->vendor_id;
        $addToCart->product_id = $request->product_id;
        $addToCart->price = $request->price;
        $addToCart->qty = $request->qty ? $request->qty : 1;
        $addToCart->total_price = 1*$request->price;
        $addToCart->save();
        return redirect()->back()->withSuccess('Product has been added to cart');
    }

    public function checkout()
    {
        $products = Cart::with('product')->where('user_id', auth()->user()->id)->get();
        return view('frontend.checkout.index', compact('products'));
    }

    public function cartProductUpdate(Request $request, $id)
    {
        $cart = Cart::find($id);
        $cart->qty = $request->qty;
        $cart->save();
        return redirect()->back()->withSuccess('Product Cart has been updated');
    }

    public function cartProductDelete($id)
    {
        $cartProduct = Cart::find($id);
        $cartProduct->delete();
        return redirect()->back()->withSuccess('Product  has been deleted from cart');
    }

    public function orderComplete(Request $request)
    {
        $order = new Order();
        $order->product_id = $request->product_id;
        $order->vendor_id = $request->vendor_id;
        $order->user_id = auth()->check() ? auth()->user()->id : 1;
        $order->total_price = $request->total_price;
        $order->total_qty = $request->total_qty;
        $order->save();

        if($order->save()){
            $orderDetails = new OrderDetails();
            $orderDetails->order_id = $order->id;
            $orderDetails->name = $request->name;
            $orderDetails->email = $request->email;
            $orderDetails->phone = $request->phone;
            $orderDetails->address = $request->address;
            $orderDetails->save();
        }

        $product = Product::where('id', $order->product_id)->first();
        $product->qty = $product->qty - $request->total_qty;
        $product->save();

        $cartEmpty = Cart::where('user_id', auth()->user()->id)->get();
        foreach($cartEmpty as $cart){
            $cart->delete();
        }

        return redirect('/')->withSuccess('Your Oreder has been completed');

    }



}
