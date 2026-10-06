<?php

namespace App\Http\Controllers;
use App\Models\AccessoriesModel;
use Illuminate\Http\Request;

class AccessoriesController extends Controller
{

    public function Accessories()
    {
        $Accessories = AccessoriesModel::orderBy("created_at", "desc")->get();
        return view('accessories', compact('Accessories'));
    }
}
