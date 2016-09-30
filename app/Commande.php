<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $fillable = ['num','date','quantite','statut','photo_id','format_id','users_id','messageaccomp_id'];

    protected $table = 'commande';

    public function users(){
        return $this->hasOne('App\User');
    }
    public function client(){
        return $this->belongsToMany('App\Client');
    }
    public function adresse(){
        return $this->belongsToMany('App\Adresse');
    }
}
