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
    public function candidatures(){
      return $this->belongsTo('App\Condidature');
    }

    protected static function boot() {
         parent::boot();

         static::deleting(function($emploi) { // before delete() method call this
              $emploi->cvs()->delete();
              $emploi->tests()->delete();
              // do the rest of the cleanup...
         });
     }

}
