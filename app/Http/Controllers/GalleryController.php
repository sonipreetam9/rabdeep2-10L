<?php

namespace App\Http\Controllers;

use App\Models\GalleryModel;
use Illuminate\Http\Request;

class GalleryController extends Controller
{


    public function Gallery()
    {
        $gallery = GalleryModel::orderBy("id","desc")->get();
        return view('gallery', compact('gallery'));
    }
}
