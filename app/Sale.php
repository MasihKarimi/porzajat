<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function Product()
    {
        return $this->belongsTo('App\Product');
    }
}