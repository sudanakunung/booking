<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'city';
    protected $fillable = ['city_name', 'slug'];

    // public function city_property(){
    //     return $this->hasMany('App\Property');
    // }
}
