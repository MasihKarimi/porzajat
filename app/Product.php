<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function Stock()
    {
        return $this->hasMany('App\Stock');
    }
    public function Sale()
    {
        return $this->hasMany('App\Sale');
    }
}