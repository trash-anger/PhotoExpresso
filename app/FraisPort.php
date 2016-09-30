<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FraisPort extends Model
{
    protected $fillable = ['intitule','prix'];

    protected $table = 'fraisport';
}
