<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Admin;
use App\Models\Item;

class Category extends Model
{
  protected $fillable = [
      'cate_name',
  ];

  public function item()
  {
    return $table->hasMany(Item::class);
  }

}
