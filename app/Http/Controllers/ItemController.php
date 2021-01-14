<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;


class ItemController extends Controller
{
  public function index()
  {
    $items = Item::all();

    return view('guest.index', [
      'items' => $items,
    ]);
  }

  public function detail($itemid)
  {
    $item = Item::findOrFail($itemid);

    return view('guest.detail', [
      'item' => $item,
    ]);
  }
}
