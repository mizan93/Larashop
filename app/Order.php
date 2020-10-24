<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function items(){
        return $this->belongsToMany(Product::class,'order_items','order_id','product_id')->withPivot('price2','quantity2')->withTimestamps();
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
