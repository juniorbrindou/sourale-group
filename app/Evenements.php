<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evenements extends Model
{
    protected $fillable = [
        'libelle',
        'lieu',
        'caution',
        'date_debut_evenement',
        'date_fin_evenement',
        'nbr_personne',
        'client_id',
        'type_evenement_id',
        'montant_total',
        'status',
        'nb_jour',
        'percentage_caution',
        'remise'
    ];


    /**
     * article
     * @return Illuminate\Database\Eloquent\Model
     */
    public function type_evenement()
    {
        return $this->belongsTo(Type_evenements::class);
    }

    /**
     * article
     * @return Illuminate\Database\Eloquent\Model
     */
    public function client()
    {
        return $this->belongsTo(Clients::class);
    }


    /**
     * Nouveau champs factices pour l'agenda
     */
    public function getDateDebutEvenementAttribute()
    {
        return $this->attributes['date_debut_evenement'];
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
