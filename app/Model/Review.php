<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $appends = ['product_name'];

    public function product()
  {
    return $this->hasOne('App\Model\Product', 'id', 'product_id');
  }

  public function getProductNameAttribute()
  {
      if($this->relationLoaded('product'))
      {
        return $this->product->title;
      }
      return '';
  }

}
