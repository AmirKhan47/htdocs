<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HospitalExpense extends Model
{
    public function header()
    {
    	return $this->belongsTo('App\Header');
    }
}
