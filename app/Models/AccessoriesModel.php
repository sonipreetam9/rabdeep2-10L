<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccessoriesModel extends Model
{

    protected $table = "accessories";

    protected $fillable = [
        'category',
        'title',
        'image',
        'price'
    ];
}
