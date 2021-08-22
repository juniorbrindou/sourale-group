<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evenements extends Model
{
    protected $fillable = ['libelle', 'lieu', 'caution', 'date_debut_evenement', 'date_fin_evenement', 'nbr_personne', 'client_id', 'type_evenement_id', 'montant_total','status'];


    /**
     * article
     * @return Illuminate\Database\Eloquent\Model
     */
    public function Type_evenement()
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
}
