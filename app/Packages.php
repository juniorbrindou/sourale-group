<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'libelle', 'code', 'categorie_id', 'prix_location', 'description', 'nbr_personnes'
	];

	/**
	 * Categorie 
	 * @return Illuminate\Database\Eloquent\Model
	 */
	public function categorie()
	{
		return $this->belongsTo(Categories::class);
	}
}
