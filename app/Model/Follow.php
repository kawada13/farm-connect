<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    public function client()
  {
    return $this->belongsTo('App\Model\Client', 'client_id', 'id');
  }
}
