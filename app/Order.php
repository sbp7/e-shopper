<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'phone'
    ];

    public function user () {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function products () {
        return $this->belongsToMany('App\Product', 'orders_to_products');
    }
}
