<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Models\SleepingOwlModel;

class Metaportofolio extends SleepingOwlModel
{
    //
	protected $table = 'metaportofolios';
	
	protected $fillable = ['portofolio_id', 'group','name','value'];
	
	
}
