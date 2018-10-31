<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
  public function questions(){
    return $this->hasMany('App\Question');
  }
  public function user(){
    return $this->belongsTo('App\User');
  }
  public function emplois(){
    return $this->belongsTo('App\Emploi');
  }
  public function candidatures(){
    return $this->belongsTo('App\Candidature');
  }

  protected static function boot() {
       parent::boot();

       static::deleting(function($test) { // before delete() method call this
            $test->questions()->delete();
            // do the rest of the cleanup...
       });
   }

}
