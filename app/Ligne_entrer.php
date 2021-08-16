<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ligne_entrer extends Model
{
    protected $fillable = [
        'code', 'article_id', 'entrer_id'
    ];

    /**
     * article
     * @return Illuminate\Database\Eloquent\Model
     */
    public function articles()
    {
        return $this->belongsTo(Articles::class);
    }

    /**
     * entrer
     * @return Illuminate\Database\Eloquent\Model
     */
    public function entrers()
    {
        return $this->belongsTo(Entrers::class);
    }
}
