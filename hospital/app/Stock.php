<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public function header()
    {
    	return $this->belongsTo('App\Header');
    }
}
