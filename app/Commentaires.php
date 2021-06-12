<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentaires extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'titre', 'contenu', 'user_id'
	];
}
