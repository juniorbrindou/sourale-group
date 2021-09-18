<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factures extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'user_id', 'total', 'date_creation', 'caution', 'evenement_id','libelle'
    ];


    /**
     * article
     * @return Illuminate\Database\Eloquent\Model
     */
    public function evenement()
    {
        return $this->belongsTo(Evenements::class);
    }

    /**
     * article
     * @return Illuminate\Database\Eloquent\Model
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
