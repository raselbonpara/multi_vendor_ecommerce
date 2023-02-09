<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;

class SubcategoryController extends Controller
{
    public function subcategoryCreate()
    {
        $categories = Category::get();
        return view('backend.admin.subcategory.create', compact('categories'));
    }


    public function subcategoryManage()
    {

        $subcategories = Subcategory::with('category')->paginate(15);
        return view('backend.admin.subcategory.list', compact('subcategories'));
        
    }


    public function subcategoryStore(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required|integer',
            'name' => 'required|string'
        ]);

        $subcategory = new Subcategory();
        $subcategory->category_id = $request->category_id;
        $subcategory->name = $request->name;
        $subcategory->slug = str_replace(' ', '-', strtolower($request->name));
        $subcategory->save();
        return redirect()->back()->with('success', 'Subcategory has been created');
    }


}
