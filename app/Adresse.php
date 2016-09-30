<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    protected $fillable = ['intitule','adresse1','adresse2','codePostal','ville','pays','users_id'];

    protected $table = 'adresse';

    public function users(){
        return $this->hasOne('App\User');
    }

    public function commande(){
        return $this->belongsToMany('App\Commande');
    }
    public function client(){
        return $this->belongsToMany('App\Client');
    }
}
