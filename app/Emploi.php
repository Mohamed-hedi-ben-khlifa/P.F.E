<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emploi extends Model
{
    public function user(){
      return $this->belongsTo('App\User');
    }
    public function cvs(){
      return $this->hasMany('App\Cv');
    }
    public function tests(){
      return $this->hasMany('App\Test');
    }
    public static function boot(){


static::deleting(function($id){

 $emploi->tests()->delete();
 $emploi->cvs()->delete();

});
}
}
