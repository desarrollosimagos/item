<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Models\SleepingOwlModel;

class Emails extends SleepingOwlModel
{
    //
	protected $table = 'newsletter_emails';
	
	protected $fillable = ['email'];
	
	public static function getList(){
		$emails = Emails::all();
		
		$i = 0;
		foreach($emails as $li){
			$value[$i] = $li->email;
			$key[$i] = $li->id;
			$i++;
		}
		$lista = array_combine($key,$value);
		
		return $lista;
	}
}

