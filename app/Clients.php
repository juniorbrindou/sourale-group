<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'code','nom', 'prenoms', 'contact1', 'contact2', 'adresse', 'user_id'
	];

}