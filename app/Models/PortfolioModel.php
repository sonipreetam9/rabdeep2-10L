<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioModel extends Model
{

    protected $table = "portfolio";
    protected $fillable = [
        "title",
        "image"
    ];
}
