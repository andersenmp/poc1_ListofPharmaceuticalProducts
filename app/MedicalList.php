<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalList extends Model
{
  public function user(){
    return $this->belongsTo('App\User','requested_by');
  }
}
