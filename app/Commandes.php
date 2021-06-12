<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commandes extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'qte', 'date_commande', 'date_livraison', 'date_fin', 'lieu_livraison', 'article_id', 'client_id', 'facture_id'
	];

}
