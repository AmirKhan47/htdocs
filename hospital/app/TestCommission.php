<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestCommission extends Model
{
    public function doctor()
    {
    	return $this->belongsTo('App\Doctor');
    }
}
