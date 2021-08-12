<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarification extends Model
{
    protected $fillable = ['prix', 'type_article_id', 'categorie_article_id'];

    /**
     * Categorie  article
     * @return Illuminate\Database\Eloquent\Model
     */
    public function categorie_article()
    {
        return $this->belongsTo(Categories::class);
    }

    /**
     * Categorie  article
     * @return Illuminate\Database\Eloquent\Model
     */
    public function type_article()
    {
        return $this->belongsTo(Type_articles::class);
    }
}
