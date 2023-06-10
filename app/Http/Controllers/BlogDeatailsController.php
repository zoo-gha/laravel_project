<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogDeatailsController extends Controller
{
    public function index()
    {
        return view('frontend.blog.blogdetails');
    }
    public function voir()
    {
        return view('frontend.blog.blogs');
    }
}
