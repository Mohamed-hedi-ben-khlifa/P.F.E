<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','telephone','date_de_naissance'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function emplois(){
      return $this->hasMany('App\Emploi');
    }
    public function cvs(){
      return $this->hasMany('App\Cv');
    }
    public function tests(){
      return $this->hasMany('App\Test');
    }
    public function candidatures(){
      return $this->hasMany('App\Candidature');
    }

    protected static function boot() {
         parent::boot();

         static::deleting(function($user) { // before delete() method call this
              $user->emplois()->delete();
              $user->tests()->delete();
              $user->cvs()->delete();
              // do the rest of the cleanup...
         });
     }

}
