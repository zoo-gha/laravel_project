<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(3);
        $categories = Category::all();

        return view('admin.products.index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');

        return view('admin.products.insert', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'price' => 'required|numeric',
            'description' => 'required',
            'details' => 'required',
            'weight' => 'required',
            'category_id' => 'required|exists:categories,id'
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $product = new Product();
        $product->nom = $request->nom;
        $product->image = $imageName;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->details = $request->details;
        $product->weight = $request->weight;
        $product->category_id = $request->category_id;
        $product->save();

        return redirect()->route('products.index')->withInput()->with('success', 'Product Created Successfuly!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.products.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::pluck('name', 'id');

        return view('admin.products.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'nom' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'price' => 'required|numeric',
            'description' => 'required',
            'details' => 'required',
            'weight' => 'required',
            'category_id' => 'required|exists:categories,id'
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $product->nom = $request->nom;
        $product->image = $imageName;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->details = $request->details;
        $product->weight = $request->weight;
        $product->category_id = $request->category_id;
        $product->save();

        return redirect()->route('products.index')->withInput()->with('success', 'Product updated Successfuly!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Product::destroy($product->id);
        return redirect()->route('products.index')->with('success', 'Product Deleted Successfuly!!');
    }
}
