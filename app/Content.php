<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use SleepingOwl\Models\SleepingOwlModel;

class Content extends SleepingOwlModel
{
    //
	protected $table = 'contents';
	
	protected $fillable = ['page_id','name', 'content', 'order'];
	
	
	public static function getList(){
		$content = Content::all();
		
		$i = 0;
		foreach($content as $li){
			$value[$i] = $li->name;
			$key[$i] = $li->id;
			$i++;
		}
		$lista = array_combine($key,$value);
		
		return $lista;
	}
}
