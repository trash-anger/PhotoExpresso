<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageAccomp extends Model
{
    protected $fillable = ['contenu'];

    protected $table = 'messageaccomp';

    public function commande(){
        return $this->hasOne('App\Commande','users_id','id');
    }
    public function users(){
        return $this->belongsToMany('App\User');
    }
    public function client(){
        return $this->belongsToMany('App\Client');
    }
}
