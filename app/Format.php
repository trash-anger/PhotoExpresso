<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Format extends Model
{
    protected $fillable = ['intitule','tarif'];

    protected $table = 'format';
}
