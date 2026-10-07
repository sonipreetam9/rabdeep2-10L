<?php

namespace App\Http\Controllers;

use App\Models\AccessoriesModel;
use App\Models\ProductModel;
use App\Models\BlogModel;
use App\Models\CategoryModel;
use App\Models\ReelModel;
use Illuminate\Http\Request;

class IndexController extends Controller
{

   public function Index()
{
    // Fetch active categories (status = 1) that have at least one active product
    $categories = CategoryModel::where('status', '1')
        ->has('products') // Ensures category has products
        ->with(['products' => function ($query) {
            // Filter active products, order them, and limit to 6 per category
            $query->where('product_status', '1')
                  ->orderBy('product_id', 'desc')
                  ->limit(6); // Added limit here
        }])
        ->get();

    $Accessories = AccessoriesModel::orderBy('id', 'desc')->limit('6')->get();
    $blogs = BlogModel::orderBy("created_at", "desc")->limit('3')->get();
    $reels = ReelModel::orderBy('id', 'desc')->limit('6')->get();

    // Pass $categories to the view instead of $products
    return view('index', compact('categories', 'Accessories', 'blogs', 'reels'));
}

}
