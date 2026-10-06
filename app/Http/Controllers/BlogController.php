<?php

namespace App\Http\Controllers;

use App\Models\BlogModel;
use Illuminate\Http\Request;

class BlogController extends Controller
{


    public function Blog()
    {
        $blogs = BlogModel::orderBy('created_at', 'desc')->get();
        return view('blog', compact('blogs'));
    }

    public function BlogDetail($slug)
    {
        $blog = BlogModel::where('slug', $slug)->firstOrFail();
        $blogs = BlogModel::orderBy('created_at', 'desc')->limit(5)->get();
        return view('blog-details', compact('blog', 'blogs'));
    }

}
