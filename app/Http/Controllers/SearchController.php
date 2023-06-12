<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->get('query');
        $products = Product::where('nom', 'LIKE', '%' . $query . '%')->get();

        return view('frontend.search.index', compact('products'));
    }
}
