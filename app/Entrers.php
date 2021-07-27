<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrers extends Model
{
    protected $fillable = [
        'code', 'qte_recu', 'prix_achat_unitaire', 'date_reception', 'isValidated', 'user_id', 'article_id', 'fournisseur_id'
    ];


    /**
     * fournisseur
     * @return Illuminate\Database\Eloquent\Model
     */
    public function fournisseur()
    {
        return $this->belongsTo(Fournisseurs::class);
    }

    /**
     * Type article
     * @return Illuminate\Database\Eloquent\Model
     */
    public function article()
    {
        return $this->belongsTo(Articles::class);
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
