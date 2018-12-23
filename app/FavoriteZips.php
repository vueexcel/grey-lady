<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FavoriteZips extends Model
{
    //
    protected $fillable = [
		'zip_code', 'zip_code_town'
	];

	protected $hidden = [
        'user_id'
    ];
}
