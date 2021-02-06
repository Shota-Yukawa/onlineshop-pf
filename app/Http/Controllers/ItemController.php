<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;


class ItemController extends Controller
{
  public function index()
  {
    $items = Item::all();

    return view('user.items.index', [
      'items' => $items,
    ]);
  }

  public function detail($itemid)
  {
    $item = Item::findOrFail($itemid);
    $item_cate = Category::findOrFail($item->cate_id);


    return view('user.items.detail', [
      'item' => $item,
      'category' => $item_cate,

    ]);
  }
  public function category($cateid)
  {
    $items = Item::where('cate_id', $cateid)->get();
// dd($item);
    $item_cate = Category::findOrFail($cateid);

    return view('user.items.category', [
      'items' => $items,
      'category' => $item_cate,
    ]);
  }

}
