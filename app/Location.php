<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'code', 'libelle', 'description', 'qte_loue', 'qte_retour', 'date_location', 'date_retour', 'user_id', 'article_id', 'evenement_id', 'client_id', 'status', 'nb_jour', 'total_une_ligne'
    ];

    /**
     * article
     * @return Illuminate\Database\Eloquent\Model
     */
    public function article()
    {
        return $this->belongsTo(Articles::class);
    }

    /**
     * evenement
     * @return Illuminate\Database\Eloquent\Model
     */
    public function evenement()
    {
        return $this->belongsTo(Evenements::class);
    }

    /**
     * Utilisateur
     * @return Illuminate\Database\Eloquent\Model
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Client
     * @return Illuminate\Database\Eloquent\Model
     */
    public function client()
    {
        return $this->belongsTo(Clients::class);
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
