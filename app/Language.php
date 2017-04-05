<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use SleepingOwl\Models\SleepingOwlModel;

class Language extends SleepingOwlModel
{
    //
	protected $table = 'languages';
	
	protected $fillable = ['site_id','language', 'cod', 'status'];
	
	
	public static function getList(){
		$language = Language::all();
		
		$i = 0;
		foreach($language as $li){
			$value[$i] = $li->language;
			$key[$i] = $li->id;
			$i++;
		}
		$lista = array_combine($key,$value);
		
		return $lista;
	}
}
