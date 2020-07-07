<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function user()
  {
    return $this->hasOne('App\Model\User', 'client_id', 'id');
  }
}
