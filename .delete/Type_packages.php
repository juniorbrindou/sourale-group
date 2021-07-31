<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_packages extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'code', 'libelle', 'description',
	];
}