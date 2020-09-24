<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function cat()
    {
        return $this->belongsToMany('App\Category')->withTimestamps();

    }
    public function brand()
    {
        return $this->belongsToMany('App\Brand')->withTimestamps();
    }
    public function review()
    {
        return $this->belongsToMany('App\Review')->withTimestamps();
    }
}
