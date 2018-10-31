<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
  public function user(){
    return $this->belongsTo('App\User');
  }
  public function emplois(){
    return $this->belongsTo('App\Emploi');
  }
  public function experiences(){
    return $this->hasMany('App\Experience');
  }
  public function formations(){
    return $this->hasMany('App\Formation');
  }
  public function competances(){
    return $this->hasMany('App\Competance');
  }
}
