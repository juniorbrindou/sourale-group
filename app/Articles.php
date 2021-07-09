<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 'code', 'qte', 'caution', 'description', 'couleur', 'taille', 'prix', 'reduction', 'prix_reduit', 'user_id', 'autre_detail_id', 'categorie_article_id',
    ];
}
