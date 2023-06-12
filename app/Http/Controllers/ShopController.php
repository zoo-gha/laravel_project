<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::paginate(9);
        $count = Product::all()->count();
        $categories = Category::all();

        return view('frontend.shop.index', compact('products', 'categories', 'count'));
    }

    public function show(Category $category, Product $product)
    {
        //dd($request->all());
        //$category = $category;
        $products = Product::where('category_id', $category->id)->paginate(3);
        $count = Product::where('category_id', $category->id)->count();
        $categories = Category::all();
        if ($category->name === 'Tout les produits' ){
            $products = Product::paginate(9);
            $count = Product::all()->count();
        }
        //dd($products, $count);
        return view('frontend.shop.index', compact('products', 'categories', 'count'));

    }

    public function showItem(Product $product)
    {
        //dd($product);
        $products = Product::where('category_id', $product->category_id)->whereNot('id', $product->id)->get();
        //dd($products);
        return view('frontend.product.show', compact('product', 'products'));
    }

    public function showCart()
    {
        return view('frontend.cart.index');
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        //dd($product);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "product_name" => $product->nom,
                "photo" => $product->image,
                "price" => $product->price,
                "quantity" => 1
            ];
        };

        $commande_item = session()->get('commande_item', []);
        if(session()->has('cart')){
            $total = $cart[$id]['quantity'] * $cart[$id]['price'];
            $commande_item[$id] = [
                "product_name" => $product->nom,
                "photo" => $product->image,
                "price" => $product->price,
                "quantity" => $cart[$id]['quantity'],
                "total" => $total
            ];
        };
        session()->put('commande_item', $commande_item);

        session()->put('cart', $cart);
        //dd($commande_item);

        return redirect()->back()->with('success', 'Add To Cart Successfuly!!');
    }

    public function remove($id)
    {
        if($id){
            $cart = session()->get('cart');
            $commande_item = session()->get('commande_item');
            if(isset($cart[$id])){
                unset($cart[$id]);
                unset($commande_item[$id]);
                session()->put('cart', $cart);
                session()->put('commande_item', $commande_item);
            }
            session()->flash('success', 'Product Successfully removed!');
        }
        return back()->with('success', 'Product removed Successfully !');
    }
}
