<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fournisseurs extends Model
{
    protected $fillable = [
		'code', 'nom', 'contact', 'addresse'
	];
}
