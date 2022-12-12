<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::take(6)->get();
        return view('frontend.home.index',['categories'=>$categories]);
    }
    public function electronics(){
        $categories = Category::all();
        return view('frontend.pages.categories.electronics',['categories'=>$categories]);
    }

    public function product()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('frontend.product.all-product',compact('categories','products'));
    }
}
