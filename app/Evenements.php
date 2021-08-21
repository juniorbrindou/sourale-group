<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evenements extends Model
{
    protected $fillable = ['libelle', 'lieu', 'caution', 'date_debut_evenement', 'date_fin_evenement', 'nbr_personne', 'client_id', 'type_evenement_id', 'montant_total'];
}
