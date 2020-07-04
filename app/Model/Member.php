<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public function deliveryInfos()
  {
    return $this->hasMany('App\Model\DeliveryInfo', 'member_id', 'id');
  }
}
