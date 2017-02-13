<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Models\SleepingOwlModel;

class Meta extends SleepingOwlModel
{
	protected $table = 'metas';
	
	protected $fillable = ['site_id', 'name', 'value'];
	
	public function sites()
    {
        return $this->belongsTo('App\Site');
    }
	
}
