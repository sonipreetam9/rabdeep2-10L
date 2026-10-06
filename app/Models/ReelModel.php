<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReelModel extends Model
{

    protected $table = "instagram_reels";
    protected $fillable = ['instagram_url', 'thumbnail'];

}
