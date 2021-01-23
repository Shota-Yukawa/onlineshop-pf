<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserFavoriteController extends Controller
{

    public function __construct()
     {
         $this->middleware('auth:user');
     }

    public function store($itemid)
    {
      // 認証済みユーザ（閲覧者）が、 idのitemをfavoriteする
      \Auth::user()->favorite($itemid);

      return back();

    }

    public function destroy($itemid)
    {
      // 認証済みユーザ（閲覧者）が、 idのitemをunfavoriteする
      \Auth::user()->unfavorite($itemid);

      return back();
    }
}
