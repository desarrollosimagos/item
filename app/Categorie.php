<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Models\SleepingOwlModel;

class Categorie extends SleepingOwlModel
{
    //
	protected $table = 'categories';
	
	protected $fillable = ['name'];
	
	public static function getList(){
		$categorie = Categorie::all();
		
		$i = 0;
		foreach($categorie as $li){
			$value[$i] = $li->name;
			$key[$i] = $li->id;
			$i++;
		}
		$lista = array_combine($key,$value);
		
		return $lista;
	}
}
