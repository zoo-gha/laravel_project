<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id())
        {
            $usertype = Auth()->user()->usertype;

            if($usertype=='user')
            {
                $products = Product::take(6)->get();
                $categories = Category::all();
                $blogs = Blog::take(4)->get();
                return view('frontend.homepage', compact('products', 'categories', 'blogs'));
            }
            else if($usertype=='admin')
            {
                return view('admin.adminhome');
            }
            else{
                return redirect()->back();
            }
        }
    }
}
