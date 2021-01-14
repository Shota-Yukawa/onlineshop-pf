<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;

Use Auth;

class UserItemsController extends Controller
{

  public function __construct()
   {
       $this->middleware('auth:user');
   }

    public function index()
    {
      $items = Item::all();
      // $user = User::findOrFail($userid);
      $user = \Auth::user();
  // dd($user);
      return view('user.items.index', [
        'items' => $items,
        'user' => $user,
      ]);
    }

    public function detail($itemid)
    // public function detail($itemid, $userid)
    {
      $item = Item::findOrFail($itemid);
      // $user = User::findOrFail($userid);


      return view('user.items.detail', [
        'item' => $item,
        // 'user' => $user,

      ]);
    }


    public function favorites($userid)
    {
       $user = User::findOrFail($userid);
       // dd($user);
       $user->loadRelationshipCounts();

       $favorites = $user->favorites()->paginate(10);

       return view('user.items.favorites', [
           'user' => $user,
           'items' => $favorites,
       ]);
    }



}
