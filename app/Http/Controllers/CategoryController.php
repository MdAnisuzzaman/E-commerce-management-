<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('backend.category.index',['categories'=>$categories]);
    }

    public function create(){
        return view('backend.category.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'max:15  | min:4  | unique:categories'
        ]);
        $category = new Category;
        $category->name = $request->name;
        $category->save();
        return redirect()->back()->with('msg', 'Category Added Successfully');
        
    }

    public function delete(Request $request ,$catId)
    {
        $category = Category::find($catId);
        $category->delete();
        return redirect()->back()->with('msg','Category Deleted Successfully!');
    }
    public function edit($catId)
    {
        $category = Category::find($catId);
        return view('backend.category.edit',compact('category'));
    }
    public function update(Request $request,$catId)
    {
        $request->validate([
            'name' => 'max:15  | min:4  | unique:categories'
        ]);
        $category = Category::find($catId);
        $category->name = $request->name;
        $category->save();
        return redirect(route('category.index'))->with('msg', 'Category Updated Successfully');
    }

}
