<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

    protected $fillable = [
        'store_id', 'name', 'sku', 'quantity', 'price',
    ];



    public function stores() {

        return $this->belongsToMany('App\Store');
    }
}
