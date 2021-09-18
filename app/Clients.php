<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'nom', 'contact1', 'contact2', 'adresse', 'user_id'
    ];


    public function evenements()
    {
        return $this->hasOne(Evenements::class, 'client_id');
    }
}
