<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
  public function user()
  {
    return $this->hasOne('App\Model\User', 'member_id', 'id');
  }

  public function deliveries()
  {
    return $this->hasMany('App\Model\Delivery', 'member_id', 'id');
  }
}
