<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SliderImage extends Model
{
    protected $table = 'slider_images';

    public function user(){
        return $this->belongsTo('App\User');
    }
}
