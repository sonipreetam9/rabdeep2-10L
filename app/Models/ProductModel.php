<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'product';

    protected $primaryKey = 'product_id';

    public $timestamps = true;

    protected $fillable = [
        'category_id',
        'sub_cat_id',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'product_name',
        'engine',
        'tyre',
        'paint',
        'gear',
        'fuel',
        'slug',
        'product_image1',
        'product_image2',
        'product_image3',
        'product_brand',
        'product_author',
        'product_short_description',
        'product_long_description',
        'product_price',
        'product_discount_price',
        'shipping_cost',
        'product_status',
    ];
}