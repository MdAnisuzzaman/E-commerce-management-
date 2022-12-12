<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index(){
        $products = Product::all();
        return view('backend.product.index',['products'=>$products]);
    }

    public function create(){
        $categories = Category::all();
        return view('backend.product.create',compact('categories'));
    }

    public function store(Request $request){
        
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->short_desc = $request->short_desc;
        $image = $request->image;
        if($image){
            $folder = 'backend-assets/db-images/products-images/';
            $imageName = 'pi'. time(). '.' . $image->getClientOriginalExtension(); 
            $image->move($folder,$imageName);
            $product->image = $folder.$imageName;
        }
        $product->save();
        return redirect()->back()->with('msg', 'Product Added Successfully');
        
    }

    public function delete(Request $request ,$catId)
    {
        $product = Product::find($catId);
        $product->delete();
        return redirect()->back()->with('msg','Product Deleted Successfully!');
    }
    public function edit($catId)
    {
        $product = Product::find($catId);
        return view('backend.product.edit',compact('product'));
    }
    public function update(Request $request,$catId)
    {
        
        $product = Product::find($catId);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->short_desc = $request->short_desc;
        $product->save();
        return redirect(route('product.index'))->with('msg', 'Product Updated Successfully');
    }
}
