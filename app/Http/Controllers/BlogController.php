<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::paginate(2);
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = BlogCategory::pluck('name', 'id');

        return view('admin.blogs.insert', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'content' => 'required',
            'author' => 'required',
            'image_auth' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'category_id' => 'required|exists:blog_categories,id'
        ]);

        $photo = time().'.'.$request->photo->extension();
        $request->photo->move(public_path('images/blogs'), $photo);
        $image_auth = time().'.'.$request->image_auth->extension();
        $request->image_auth->move(public_path('images/blogs/author'), $image_auth);
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->photo = $photo;
        $blog->content = $request->content;
        $blog->author = $request->author;
        $blog->image_auth = $image_auth;
        $blog->category_id = $request->category_id;
        $blog->save();
        return redirect()->route('blogs.index')->withInput()->with('success', 'Blog created successfuly!!');
    }

    public function voir()
    {
        return view('frontend.blog.blogs');
    }



    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $categories = BlogCategory::pluck('name', 'id');

        return view('admin.blogs.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'content' => 'required',
            'author' => 'required',
            'image_auth' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'category_id' => 'required|exists:blog_categories,id'
        ]);

        $photo = time().'.'.$request->photo->extension();
        $request->photo->move(public_path('images/blogs'), $photo);
        $image_auth = time().'.'.$request->image_auth->extension();
        $request->image_auth->move(public_path('images/blogs/author'), $image_auth);
        $blog->title = $request->title;
        $blog->photo = $photo;
        $blog->content = $request->content;
        $blog->author = $request->author;
        $blog->image_auth = $image_auth;
        $blog->category_id = $request->category_id;
        $blog->save();
        return redirect()->route('blogs.index')->withInput()->with('success', 'Blog updated successfuly!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        Blog::destroy($blog->id);
        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfuly!!');
    }
}
