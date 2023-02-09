<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Review;




class FrontendController extends Controller
{
    public function index()
    {
       // $categories = Category::with('subcategory')->get();
       // return view('frontend.home.index', compact('categories'));
       $new_products = Product::with('category', 'color', 'size')->where('type', 'new')->where('status', 1)->get();
       $hot_products = Product::with('category', 'color', 'size')->where('type', 'hot')->where('status', 1)->get();
       $discount_products = Product::with('category', 'color', 'size')->where('type', 'discount')->where('status', 1)->get();
       return view('frontend.home.index', compact('new_products', 'hot_products', 'discount_products'));
    }

    public function productDetails($id)
    {
        
        $product = Product::with('reviews')->find($id);
        return view('frontend.home.product-details', compact('product'));
    }


    //User Authentication Work

    public function userRegister()
    {
        return view('frontend.user.auth');
    }

    public function userLogin()
    {
        return view('frontend.user.auth');
    }

    public function customerReview(Request $request)
    {
        $rating = new Review();
        $rating->user_id = auth()->user()->id;
        $rating->product_id = $request->product_id;
        $rating->rating = $request->rating;
        $rating->message = $request->message;
        $rating->save();
        return redirect()->back()->withSuccess('Thanks for your feedback');

    }
}
