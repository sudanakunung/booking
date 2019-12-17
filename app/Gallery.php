<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
	protected $table = 'gallery';
    public function gallery_property(){
        return $this->belongsTo('App\Property','uid', 'uid');
    }

    protected $fillable = ['gambar', 'uid'];
}
