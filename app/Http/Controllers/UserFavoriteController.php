<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserFavoriteController extends Controller
{

    public function __construct()
     {
         $this->middleware('auth:user');
     }

    public function store($id)
    {
      // 認証済みユーザ（閲覧者）が、 idのitemをfavoriteする
      \Auth::user()->favorite($id);

      return back();

    }

    public function destroy($id)
    {
      // 認証済みユーザ（閲覧者）が、 idのitemをunfavoriteする
      \Auth::user()->unfavorite($id);

      return back();
    }
}
