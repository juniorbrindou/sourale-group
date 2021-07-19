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
        'libelle', 'code', 'caution', 'description', 'prix', 'user_id', 'categorie_article_id', 'type_article_id', 'article_photo',

    ];


    /**
     * Categorie  article
     * @return Illuminate\Database\Eloquent\Model
     */
    public function categorie_article()
    {
        return $this->belongsTo(Categorie_articles::class);
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
