<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_evenements extends Model
{
    protected $fillable = ['code', 'libelle', 'description'];
}
