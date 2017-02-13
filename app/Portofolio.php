<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Models\SleepingOwlModel;

use SleepingOwl\Models\Interfaces\ModelWithImageFieldsInterface;
use SleepingOwl\Models\Traits\ModelWithImageOrFileFieldsTrait;

class Portofolio extends SleepingOwlModel implements ModelWithImageFieldsInterface
{
    //
	protected $table = 'portofolios';
	
	protected $fillable = ['page_id','categorie_id', 'title','file','date','short_describe','html'];
	
	public function getImageFields()
    {
        return [
            'file' => 'images/',
        ];
    }
	
	public static function getList(){
		$portofolio = Portofolio::all();
		
		$i = 0;
		foreach($portofolio as $li){
			$value[$i] = $li->title;
			$key[$i] = $li->id;
			$i++;
		}
		$lista = array_combine($key,$value);
		
		return $lista;
	}
}
