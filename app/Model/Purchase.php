<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    public function product()
  {
    return $this->belongsTo('App\Model\Product', 'product_id', 'id');
  }
    public function delivery()
  {
    return $this->belongsTo('App\Model\Delivery', 'delivery_id', 'id');
  }
}
