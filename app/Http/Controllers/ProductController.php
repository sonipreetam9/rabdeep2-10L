<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function Product()
    {
        $products = ProductModel::orderBy('product_id', 'desc')->get();
        return view('product', compact('products'));
    }

    public function ProductDetails($slug)
    {
        $product = ProductModel::where('slug', $slug)->firstOrFail();
        return view('product-details', compact('product'));
    }

}