<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Cart;

class UserCartController extends Controller
{
  public function __construct()
   {
       $this->middleware('auth:user');
   }


  public function store(Request $request, $itemid)
  {
    $item = Item::find($itemid);

    $cart = new Cart;
    $cart->item_id = $item->id;
    $cart->price = $item->price;
    $cart->name = $item->name;
    $cart->imgpath = $item->imgpath;
    $cart->cart_quantity = 1;
    \Auth::user()->carts()->save($cart);

    return back();
  }

  public function destroy($itemid)
  {
    \Auth::user()->carts()
         ->where('id', $itemid)->firstOrFail()->delete();

         return back();
  }

  public function qtystore(Request $request, $cartid)
    {
      $cart = Cart::findOrFail($cartid);

      $item = Item::findOrFail($cart->item_id);

      $cart->item_id = $item->id;
      $cart->price = $item->price;
      $cart->cart_quantity = $request->cart_quantity;
      \Auth::user()->carts()->save($cart);

      return back();
    }

}
