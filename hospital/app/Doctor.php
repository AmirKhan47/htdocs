<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    public function testcommission()
    {
        return $this->hasMany('App\TestCommission');
    }
}
