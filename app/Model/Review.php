<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Review extends Model
{
    protected $appends = ['product_name', 'format_created_at'];

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

  public function getFormatCreatedAtAttribute()
  {
    //   return Carbon::parse($this->created_at)->format('Y-m-d H:i:s');
      return $this->created_at->format('Y-m-d H:i:s');
  }

}
