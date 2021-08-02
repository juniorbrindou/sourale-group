<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destockage extends Model
{
    protected $fillable = ['qte', 'motif', 'article_id'];


    /**
     * article
     * @return Illuminate\Database\Eloquent\Model
     */
    public function article()
    {
        return $this->belongsTo(Articles::class);
    }
}
