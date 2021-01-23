<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Admin;

class Cart extends Model
{
  protected $fillable = [
      'cart_quantity', 'price'
  ];

  public function item()
  {
    return $this->belongsTo('App\Models\Item');
  }
  public function user()
  {
    return $this->belongsTo('App\Models\User');
  }
}
