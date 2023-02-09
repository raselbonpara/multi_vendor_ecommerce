<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

use App\Models\Brand;


class BrandController extends Controller
{
    public function brandCreate()
    {
        $categories = Category::get();
        return view('backend.admin.brand.create', compact('categories'));
    }


    public function brandManage()
    {

        $brands = Brand::with('category')->paginate(15);
        return view('backend.admin.brand.list', compact('brands'));
        
    }


    public function brandStore(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required|integer',
            'name' => 'required|string'
        ]);

        $brand = new Brand();
        $brand->category_id = $request->category_id;
        $brand->name = $request->name;
        $brand->slug = str_replace(' ', '-', strtolower($request->name));
        $brand->save();
        return redirect()->back()->with('success', 'Brand has been created');
    }

}
