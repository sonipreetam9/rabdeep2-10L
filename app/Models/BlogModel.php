<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogModel extends Model
{

    protected $table = "blogs";
    protected $fillable = [
        'title',
        'slug',
        'image',
        'short_description',
        'long_description'
    ];
}
