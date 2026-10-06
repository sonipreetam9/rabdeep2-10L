<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model
{

    protected $table = "contactus";
    protected $fillable = [
        'name',
        'phone',
        'email',
        'message',
    ];

}
