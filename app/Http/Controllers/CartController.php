<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.cart.index');
    }

}
