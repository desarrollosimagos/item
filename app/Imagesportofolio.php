<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Models\SleepingOwlModel;

use SleepingOwl\Models\Interfaces\ModelWithImageFieldsInterface;
use SleepingOwl\Models\Traits\ModelWithImageOrFileFieldsTrait;

class Imagesportofolio extends SleepingOwlModel implements ModelWithImageFieldsInterface
{
    //
	use ModelWithImageOrFileFieldsTrait;
	
	protected $table = 'imagesportofolios';
	
	protected $fillable = ['portofolio_id', 'title','file'];
	
	public function getImageFields()
    {
        return [
            'file' => 'images/',
        ];
    }
	
	
}
