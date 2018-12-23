<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FavoriteListing extends Model
{
    //

	protected $fillable = [
		'listing_id', 'listing_address'
	];

	protected $hidden = [
        'user_id'
    ];
}
