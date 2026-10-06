<?php

namespace App\Http\Controllers;
use App\Models\PortfolioModel;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    
    public function Portfolio()
    {
        $portfolios = PortfolioModel::orderBy("created_at","desc")->get();
        return view('portfolio', compact('portfolios'));
    }

}
