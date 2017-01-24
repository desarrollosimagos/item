<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Models\SleepingOwlModel;

use DB;

class Site extends SleepingOwlModel
{
    //
	protected $table = 'sites';
	
	protected $fillable = ['name', 'domain', 'status'];
	
	public static function getList(){
		$sites = Site::all();
		
		$i = 0;
		foreach($sites as $li){
			$value[$i] = $li->name;
			$key[$i] = $li->id;
			$i++;
		}
		$lista = array_combine($key,$value);
		
		return $lista;
	}
}
