<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['pic'];

    protected $table = 'photo';

    public function commande(){
        return $this->hasOne('App\Commande','users_id','id');
    }
    public function format(){
        return $this->belongsToMany('App\Format');
    }

}
