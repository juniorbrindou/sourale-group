<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie_articles extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'code', 'libelle', 'description'
	];

}