<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['objet','contenu'];

    protected $table = 'message';
}
