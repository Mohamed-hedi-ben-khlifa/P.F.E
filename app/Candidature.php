<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
  public function emplois(){
    return $this->hasMany('App\Emploi');
  }
  public function tests(){
    return $this->hasMany('App\Test');
  }
  public function user(){
    return $this->belongsTo('App\User');
  }

}
