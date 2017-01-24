<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Models\SleepingOwlModel;

class Page extends SleepingOwlModel
{
    //
	protected $table = 'pages';
	
	protected $fillable = ['site_id','template_id', 'name', 'title'];
	
	public function sites()
    {
        return $this->belongsTo('App\Site');
    }
	
	public static function getList(){
		$pages = Page::all();
		
		$i = 0;
		foreach($pages as $li){
			$value[$i] = $li->name;
			$key[$i] = $li->id;
			$i++;
		}
		$lista = array_combine($key,$value);
		
		return $lista;
	}
}
