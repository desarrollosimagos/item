<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    //
	protected $table = 'administrators';
	
	const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';
	
	protected $fillable = ['username', 'password', 'name'];
	protected $hidden = ['created_at', 'remember_token','updated_at'];
}
