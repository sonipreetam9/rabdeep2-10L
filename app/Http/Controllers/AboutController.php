<?php

namespace App\Http\Controllers;
use App\Models\AboutModel;
use Illuminate\Http\Request;

class AboutController extends Controller
{

    public function About()
    {
        $about = AboutModel::first();
        return view('about', compact('about'));
    }

}
