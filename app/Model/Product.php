<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  public function client()
  {
    return $this->belongsTo('App\Model\Client', 'client_id', 'id');
  }
  public function productCategories()
  {
    return $this->hasMany('App\Model\ProductCategory', 'product_id', 'id');
  }

}
