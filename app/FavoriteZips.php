<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FavoriteZips extends Model
{
    //
    protected $fillable = [
		'user_id', 'zip_code', 'zip_code_town'
	];
}
