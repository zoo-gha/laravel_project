<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogcategories = BlogCategory::paginate(3);
        return view('admin.categories.blogs.index', compact('blogcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.blogs.insert');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            ]);
        $category = new BlogCategory();
        $category->name = $request->name;
        $category->save();
        // BlogCategory::create([
        // 'name' => $request->name, ]);
        return redirect()->route('blogCategories.index')->withInput()->with('success', 'Category created successfuly !');
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogCategory $blogCategory)
    {
        return view('admin.categories.blogs.edit', compact('blogCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogCategory $blogCategory)
    {

        $request->validate([
            'name' => 'required'
        ]);
        $blogCategory->name = $request->name;
        $blogCategory->save();
        return redirect()->route('blogCategories.index')->withInput()->with('success', 'Category updated successfuly !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogCategory $blogCategory)
    {
        BlogCategory::destroy($blogCategory->id);
        return redirect()->route('blogCategories.index')->with('success', 'Category Deleted successfuly !');

    }
}
