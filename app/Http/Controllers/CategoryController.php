<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $appends = ['photo_url'];

    public function getPhotoUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }
        return null;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(3);
        return view('admin.categories.products.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.products.insert');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'image'=> 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $category = new Category();
        $category->name = $request->name;
        $category->image = $imageName;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category created successfuly!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.products.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'=> 'required',
            'image'=> 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $category->name = $request->name;
        $category->image = $imageName;
        $category->save();
        return redirect()->route('categories.index')->withInput()->with('success', 'Category updated successfuly!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);
        return redirect()->route('categories.index')->with('success', 'Category deleted successfuly!');
    }
}
