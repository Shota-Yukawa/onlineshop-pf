<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Admin;

class Item extends Model
{
  protected $fillable = [
      'name', 'desc', 'price', 'imgpath',
  ];

  public function admin()
  {
    return $this->belongsTo(Admin::class);
  }

  public function favorite()
  {
    return $this->belongsToMany(User::class, 'user_favorite', 'item_id', 'user_id')->withTimestamps();
  }
  public function carts()
  {
    return $this->belongsToMany(User::class, 'carts', 'item_id', 'user_id')->withTimestamps();
  }
}
