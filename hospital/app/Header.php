<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    public function hospitalexpense()
    {
        return $this->hasMany('App\HospitalExpense');
    }
    public function otherexpense()
    {
        return $this->hasMany('App\OtherExpense');
    }
    public function stock()
    {
        return $this->hasMany('App\Stock');
    }
}
