<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Models\SleepingOwlModel;

use SleepingOwl\Models\Interfaces\ModelWithImageFieldsInterface;
use SleepingOwl\Models\Traits\ModelWithImageOrFileFieldsTrait;

class Customer extends SleepingOwlModel implements ModelWithImageFieldsInterface
{
    //
	protected $table = 'customers';
	
	protected $fillable = ['customer','file', 'date','url'];
	
	public function getImageFields()
    {
        return [
            'file' => 'customer/',
        ];
    }
	
	public static function getList(){
		$customer = Customer::all();
		
		$i = 0;
		foreach($curstomer as $li){
			$value[$i] = $li->customer;
			$key[$i] = $li->id;
			$i++;
		}
		$lista = array_combine($key,$value);
		
		return $lista;
	}
}
