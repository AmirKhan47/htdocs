<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
	// protected $table = 'my_flights';
    protected $fillable = [
    'email',
    'password',
    'image'
  ];
}
