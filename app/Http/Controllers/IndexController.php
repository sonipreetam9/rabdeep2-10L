<?php

namespace App\Http\Controllers;

use App\Models\AccessoriesModel;
use App\Models\ProductModel;
use App\Models\BlogModel;
use App\Models\ReelModel;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function Index()
    {
        $products = ProductModel::orderBy("product_id", "desc")->limit('8')->get();
        $Accessories = AccessoriesModel::orderBy('id', 'desc')->limit('6')->get();
        $blogs = BlogModel::orderBy("created_at", "desc")->limit('3')->get();
        $reels = ReelModel::orderBy('id', 'desc')->limit('6')->get();
        return view('index', compact('products', 'Accessories', 'blogs', 'reels'));
    }

}
