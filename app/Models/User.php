<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Item;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // ここからuserのアイテムfavorite機能

    public function favorites()
    {
      //中間テーブルとの紐付け
      return $this->belongsToMany(Item::class, 'user_favorite', 'user_id', 'item_id')->withTimestamps();
    }

    public function favorite($itemId)
    {
      //既にfavoriteしているかの確認
      $exist = $this->now_favorite($itemId);

      if ($exist){
        //favoritesしていれば何もしない
        return false;
      } else {
        //favoritesしてなければfavoritesに保存をする
        $this->favorites()->attach($itemId);
        return true;
      }
    }

    public function unfavorite($itemId)
    {
      //既にfavoriteしているかの確認
      $exist = $this->now_favorite($itemId);

      if ($exist) {
        //favoritesしていれば、favoritesを削除する。
        $this->favorites()->detach($itemId);
        return true;
      } else {
        //favoriteしていなければ何もしない
        return false;
      }
    }

    public function now_favorite($itemId)
    {
      //favorites中のアイテムideaと、$itemIdのものが存在するか。
      return $this->favorites()->where('item_id', $itemId)->exists();
    }

    public function loadRelationshipCounts()
    {
      $this->loadCount(['favorites']);
    }
}
