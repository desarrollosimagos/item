<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Models\SleepingOwlModel;

use SleepingOwl\Models\Interfaces\ModelWithImageFieldsInterface;
use SleepingOwl\Models\Traits\ModelWithImageOrFileFieldsTrait;

class Imagesite extends SleepingOwlModel implements ModelWithImageFieldsInterface
{
    //
	use ModelWithImageOrFileFieldsTrait;
	
	protected $table = 'imagesites';
	
	protected $fillable = ['site_id', 'title','file'];
	
	public function getImageFields()
    {
        return [
            'file' => 'site/',
        ];
    }
	
	
}
