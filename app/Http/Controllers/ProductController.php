<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function Product()
{
    // Fetch categories that are active (status = 1) and have at least one product
    $categories = CategoryModel::where('status', '1')
        ->has('products')
        ->with(['products' => function($query) {
            // Optional: Only load active products and sort them
            $query->where('product_status', '1')->orderBy('product_id', 'desc');
        }])
        ->get();

    // Pass 'categories' to the view
    return view('product', compact('categories'));
}

    public function ProductDetails($slug)
    {
        $product = ProductModel::where('slug', $slug)->firstOrFail();
        return view('product-details', compact('product'));
    }

}
