<?php

namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    protected $fillable = [
        'login','email', 'password','droit'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function commande(){
        return $this->hasOne('App\Commande','users_id','id');
    }
    public function adresse(){
        return $this->hasOne('App\Adresse','users_id','id');
    }
    public function client(){
        return $this->hasOne('App\Client','users_id','id');
    }

    public function isAdmin(){
        return $this->droit == 'admin';
    }
    public function isClient(){
        return $this->droit == 'client';
    }
}
