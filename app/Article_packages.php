<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article_packages extends Model
{
    /**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [

		'qte', 'article_id', 'package_id'
	];
}
