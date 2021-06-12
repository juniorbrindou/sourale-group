<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package_articles extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [

		'qte', 'article_id', 'type_package_id'
	];
}