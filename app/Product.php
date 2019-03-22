<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'artikul', 'brand', 'image_path', 'description', 'price', 'category_id', 'publish'
    ];

    public function category (){
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function orders ()
    {
        return $this->belongsToMany('App\Order', 'orders_to_products');
    }
}
