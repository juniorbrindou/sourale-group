<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_articles extends Model
{
    protected $fillable = ['code', 'libelle', 'description'];
}
