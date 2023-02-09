<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class ApiController extends Controller
{
    public function showNewProductList()
    {
        try{
            $newProductsList = Product::with('category', 'color', 'size')->where('type', 'new')->where('status', 1)->get();
            return response()->json([
                'status' => 200,
                'success' => $newProductsList
            ]);
        } catch(Exception $exception){
            return response()->json([
                'status' => 500,
                'error' => $exception->getMessage()
            ]);

        }
    }

    public function showHotProductList()
    {
        try{
            $hotProductsList = Product::with('category', 'color', 'size')->where('type', 'hot')->where('status', 1)->get();
            return response()->json([
                'status' => 200,
                'success' => $hotProductsList
            ]);
        } catch(Exception $exception){
            return response()->json([
                'status' => 500,
                'error' => $exception->getMessage()
            ]);

        }
    }

    public function showDiscountProductList()
    {
        try{
            $discountProductsList = Product::with('category', 'color', 'size')->where('type', 'discount')->where('status', 1)->get();
            return response()->json([
                'status' => 200,
                'success' => $discountProductsList
            ]);
        } catch(Exception $exception){
            return response()->json([
                'status' => 500,
                'error' => $exception->getMessage()
            ]);

        }
    }

    public function addToCart(Request $request)
    {
        try{
            $addToCart = new Cart();
            $addToCart->user_id = 1;
            $addToCart->vendor_id = $request->vendor_id;
            $addToCart->product_id = $request->product_id;
            $addToCart->price = $request->price;
            $addToCart->qty = $request->qty ? $request->qty : 1;
            $addToCart->total_price = 1*$request->price;
            $addToCart->save();
            return response()->json([
                'status' => 200,
                'success' => $addToCart
            ]);
        } catch(Exception $exception){
            return response()->json([
                'status' => 500,
                'error' => $exception->getMessage()
            ]);

        }
    }
}
