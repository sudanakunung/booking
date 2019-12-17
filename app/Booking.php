<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';
    protected $fillable=['id_property','jumlah_adult','jumlah_kamar','sisa_kamar','jumlah_child','date_start','date_end'];
    public function booking_user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function booking_property(){
    	return $this->belongsTo('App\Property','property_id');
    }
}
