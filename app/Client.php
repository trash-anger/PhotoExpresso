<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['nom','prenom','paypal','users_id'];

    protected $table = 'client';

    public function users(){
        return $this->hasOne('App\User');
    }
    public function adresse(){
        return $this->belongsToMany('App\Adresse');
    }
    public function commande(){
        return $this->belongsToMany('App\Commande');
    }
}
