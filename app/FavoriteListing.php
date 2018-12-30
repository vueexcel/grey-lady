<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FavoriteListing extends Model
{
    //

	protected $fillable = [
		'listing_id', 'listing_address', 'user_id', 'greylady_id'
	];

}
