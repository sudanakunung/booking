<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'property';
    protected $fillable = ['property_name', 'uid', 'slug', 'description', 'address', 'detail_address', 'longitude', 'latitude', 'city_id', 'max_person', 'total_room', 'primary_image', 'price', 'user_id'];

    public function property_booking(){
    	return $this->hasMany('App\Booking');
    }

    public function property_facility(){
        return $this->hasMany('App\Property_facility','uid', 'uid');
    }

    public function facility_list(){
        return $this->hasMany('App\Property_facility','facility_id');
        return $this->belongsTo('App\Facility','facility_id');
    }

    public function property_gallery(){
        return $this->hasMany('App\Gallery','uid', 'uid');
    }

    public function property_user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function property_city(){
        return $this->belongsTo('App\City','city_id');
    }
}
