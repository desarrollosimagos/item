<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use SleepingOwl\Models\SleepingOwlModel;

class Acces extends SleepingOwlModel
{
    //
	protected $table = 'access';
	
	protected $fillable = ['site_id', 'ip'];
	
	public function sites()
    {
        return $this->belongsTo('App\Site');
    }
	
	public static function getList(){
		$templates = Template::all();
		
		$i = 0;
		foreach($templates as $li){
			$value[$i] = $li->site_id . '-' . $li->name;
			$key[$i] = $li->id;
			$i++;
		}
		$lista = array_combine($key,$value);
		
		return $lista;
	}
}
