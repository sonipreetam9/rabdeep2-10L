<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutModel extends Model
{

    protected $table = "about";
    protected $fillable = [
        'title',
        'image',
        'short_about',
        'long_about',
    ];
}
