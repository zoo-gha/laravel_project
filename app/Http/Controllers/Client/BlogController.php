<?php

namespace App\Http\Controllers\Client;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::paginate(2);
        $blogcategories = BlogCategory::all();
        //dd($blogs);
        return view('frontend.blog.blogs', compact('blogs', 'blogcategories'));
    }

    public function show(BlogCategory $blogcategory, Blog $blogs)
    {
        $blogs = Blog::where('category_id', $blogcategory->id)->paginate(2);
        $blogcategories = BlogCategory::all();
        //dd($blogs, $blogcategories);
        if ($blogcategory->name === 'All' ){
            $blogs = Blog::paginate(2);
        }
        //dd($products, $blogcategories);
        return view('frontend.blog.blogs', compact('blogs', 'blogcategories'));

    }

    public function showItem(Blog $blog)
    {
        $blogcategories = BlogCategory::all();
        return view('frontend.blog.blogdetails', compact('blog', 'blogcategories'));
    }
}
