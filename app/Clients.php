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
		'nom', 'tel1', 'tel2', 'adresse', 'user_id'
	];

}