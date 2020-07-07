<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
  public function member()
  {
    return $this->hasOne('App\Model\Member', 'id', 'member_id');
  }
  public function client()
  {
    return $this->hasOne('App\Model\Client', 'id', 'client_id');
  }
}
