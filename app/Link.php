<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use SleepingOwl\Models\SleepingOwlModel;

class Link extends SleepingOwlModel
{
    //
	protected $table = 'links';
	
	protected $fillable = ['label', 'route','order','menu_id', 'section_id'];
	
	public static function getList(){
		$links = Link::all();
		
		$i = 0;
		foreach($links as $li){
			$value[$i] = $li->label;
			$key[$i] = $li->id;
			$i++;
		}
		$lista = array_combine($key,$value);
		
		return $lista;
	}
}
