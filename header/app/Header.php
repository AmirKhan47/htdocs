<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
	protected $fillable = [
    	'header_name',
    	'header_amount'
  	];
}
