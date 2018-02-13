<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    //
    protected $fillable = [
        'name', 'store_id',
    ];

    public function products() {

        return $this->hasMany('App\Product');
    }
}
