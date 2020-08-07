<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

  use SoftDeletes;

  protected $dates = ['deleted_at'];

  public function client()
  {
    return $this->belongsTo('App\Model\Client', 'client_id', 'id');
  }
  public function productCategories()
  {
    return $this->hasMany('App\Model\ProductCategory', 'product_id', 'id');
  }
  public function productImages()
  {
    return $this->hasMany('App\Model\ProductImage', 'product_id', 'id');
  }
  public function purchases()
  {
    return $this->hasMany('App\Model\Purchase', 'product_id', 'id');
  }
}
