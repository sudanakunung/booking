<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
	protected $table = 'facility';
	protected $fillable = ['facility_name'];

	public function p_property_facility(){
        return $this->hasMany('App\Property_facility','facility_id');
    }
}
