<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EvenementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'libelle' => $this->libelle,
            'title' => $this->libelle,
            'lieu' => $this->lieu,
            'caution' => $this->caution,
            'date_debut_evenement' => $this->date_debut_evenement,
            'date_fin_evenement' => $this->date_fin_evenement,
            'nbr_personne' => $this->nbr_personne,
            'client_id' => $this->client_id,
            'type_evenement_id' => $this->type_evenement_id,
            'montant_total' => $this->montant_total,
            'status' => $this->status,
            'nb_jour' => $this->nb_jour,
            'percentage_caution' => $this->percentage_caution,
            'remise' => $this->remise,
            'start' => $this->date_debut_evenement,
            'end' => $this->date_fin_evenement,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,

            // 'type_evenment' => $type_evenement,
        ];
    }
}
