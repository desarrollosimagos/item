<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use SleepingOwl\Models\SleepingOwlModel;

class Template extends SleepingOwlModel
{
    //
	protected $table = 'templates';
	
	protected $fillable = ['name', 'site_id', 'route'];
	
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
