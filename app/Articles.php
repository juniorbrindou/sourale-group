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
        'libelle', 'code', 'description', 'prix', 'user_id', 'qte_stocker',
        'qte_en_stock', 'categorie_id', 'type_article_id', 'article_photo', 'prix_tarification', 'tarification_id'

    ];


    /**
     * Categorie  article
     * @return Illuminate\Database\Eloquent\Model
     */
    public function categorie()
    {
        return $this->belongsTo(Categories::class);
    }

    public function tarification()
    {
        return $this->belongsTo(Tarification::class);
    }

    /**
     * Type article
     * @return Illuminate\Database\Eloquent\Model
     */
    public function type_article()
    {
        return $this->belongsTo(Type_articles::class);
    }

    /**
     * Utilisateur update article
     * @return Illuminate\Database\Eloquent\Model
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /**
     * les attributs qui doivent etre converties en type natif.
     * @var array
     */
    protected $casts = [
        "deleted_at" => "datetime:Y-m-d H:i:s",
        "updated_at" => "datetime:Y-m-d H:i:s",
        "created_at" => "datetime:Y-m-d H:i:s",
    ];
}
