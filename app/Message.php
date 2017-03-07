<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Models\SleepingOwlModel;

class Message extends Model
{
    //
    protected $table = 'contact_fale_connosco';
	
	protected $fillable = ['name','email', 'subject','message'];
	
	public static function getList(){
		$messages = Message::all();
		
		$i = 0;
		foreach($messages as $li){
			$value[$i] = $li->email;
			$key[$i] = $li->id;
			$i++;
		}
		$lista = array_combine($key,$value);
		
		return $lista;
	}
}
