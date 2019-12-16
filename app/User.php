<?php

namespace App;
use App\Province;
use App\District;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use Authenticatable;
    protected $fillable=['name','email','password','photo','about','blood','district_id','phone','sickness','status'];

    public function province()
    {
        return $this->belongsTo('App\Province');
    }
    public function district()
    {
        return $this->belongsTo('App\District');
    }
}
