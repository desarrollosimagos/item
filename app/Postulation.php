<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Models\SleepingOwlModel;

class Postulation extends Model
{
    //
    protected $table = 'contact_trabalhe-connosco';
	
	protected $fillable = ['your_name','your_email','endereo','provincia','comuna','passaporte','sexo','estado_civil','nascimento','nacionalidade','naturalidade','telefone','anexar_cv'];
	
	public static function getList(){
		$postulations = Postulation::all();
		
		$i = 0;
		foreach($postulations as $li){
			$value[$i] = $li->email;
			$key[$i] = $li->id;
			$i++;
		}
		$lista = array_combine($key,$value);
		
		return $lista;
	}
}
