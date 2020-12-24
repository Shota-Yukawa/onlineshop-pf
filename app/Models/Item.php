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
}
