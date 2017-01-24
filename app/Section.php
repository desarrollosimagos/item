<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Models\SleepingOwlModel;

class Section extends SleepingOwlModel
{
    //
	protected $table = 'sections';
	
	protected $fillable = ['name', 'position', 'template_id'];
	
	public static function getList(){
		$sections = Section::all();
		
		$i = 0;
		foreach($sections as $li){
			$value[$i] = $li->name;
			$key[$i] = $li->id;
			$i++;
		}
		$lista = array_combine($key,$value);
		
		return $lista;
	}
}
