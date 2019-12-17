<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property_facility extends Model
{
    protected $table = 'property_facility';
    protected $fillable = ['facility_id', 'uid'];
    
    public function facility_property(){
        return $this->belongsTo('App\Property','uid', 'uid');
    }

    public function facility_list(){
        return $this->belongsTo('App\Facility','facility_id');
    }
}
