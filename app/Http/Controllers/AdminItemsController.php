<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Admin;
use App\Models\Category;

class AdminItemsController extends Controller
{

  public function __construct()
   {
       $this->middleware('auth:admin');
   }

    public function index()
    {
      // $data = [];

      if (\Auth::check()){

        // $admin = Auth::admin();

        // $items = $admin->items()->orderBy('created_at', 'desc')->paginate(15);
        $items = Item::all();
        // dd($items);

      }
      // return view('admin.items.index', compact('items', 'admin'));
      return view('admin.items.index', compact('items'));


    }

    public function add()
    {
      if (\Auth::check()){

        $item = new Item;
        // dd($item);

      }
      return view('admin.items.add', [
        'item' => $item,
      ]);
      // return view('admin.items.add', compact('item'));
    }


    public function store(Request $request)
    {
      $request->validate([
        'name' => 'required|unique:items|max:100',
        'desc' => 'required|max:1000',
        'price' => 'required|max:10',
        'imgpath' => 'required|file|mimes:jpeg,png,jpg,bmb',
        'cate_id' => 'required'
      ]);

      // $admin = \Auth::Admin();

      // $request->admin()->items()->create([
      //   'name' => $request->name,
      //   'desc' => $request->desc,
      //   'price' => $request->price,
      //   'imgpath' => $request->imgpath,
      // ]);


      $file = $request->file('imgpath');
      $img_path = Storage::disk('s3')->putFile('/items_images', $file, 'public');


      // if ($file = $request->imgpath) {
      //   //保存するファイルに名前をつける
      //      $fileName = 'admin' . auth::id() . '.' . $file->getClientOriginalName();
      //      //Laravel直下のpublicディレクトリに新フォルダをつくり保存する
      //      $target_path = public_path('items_images/');
      //      $file->move($target_path, $fileName);
      //  } else {
      //      $fileName = "";
      //  }

      $item = new Item;
      $item->admin_id = \Auth::id();
      $item->name = $request->name;
      $item->desc = $request->desc;
      $item->price = $request->price;
      // $item->imgpath = $fileName;
      $item->imgpath = Storage::disk('s3')->url($img_path);
      $item->cate_id = $request->cate_id;
      $item->save();

      return redirect('/admin/items/index');
    }

    public function detail($id)
    {
      $item = Item::findOrFail($id);
      $item_cate = Category::findOrFail($item->cate_id);


      return view('admin.items.detail', [
        'item' => $item,
        'category' => $item_cate,
      ]);
    }

    public function edit($id)
    {
      $item = Item::findOrFail($id);

      return view('admin.items.edit', [
        'item' => $item,
      ]);

    }

    public function update(Request $request, $id)
    {
      $request->validate([
        'name' => 'required|max:100',
        'desc' => 'required|max:1000',
        'price' => 'required|max:10',
        'imgpath' => 'file|mimes:jpeg,png,jpg,bmb',
        'cate_id' => 'required'
      ]);

      $imagefile = $request->file('imgpath');



      $item = Item::findOrFail($id);
      $item->name = $request->name;
      $item->desc = $request->desc;
      $item->price = $request->price;

      $imagefile = $request->file('imgpath');
        if( !is_null( $imagefile ) ) {
          $file = $request->file('imgpath');
          $img_path = Storage::disk('s3')->putFile('/items_images', $file, 'public');
          $item->imgpath = Storage::disk('s3')->url($img_path);
        }

      $item->cate_id = $request->cate_id;
      $item->save();

      $item_cate = Category::findOrFail($item->cate_id);

      return view('admin.items.detail', [
        'item' => $item,
        'category' => $item_cate,
      ]);

    }

    public function destroy($id)
    {
      $item = Item::findOrFail($id);

      $item->delete();

      return redirect('/admin/items/index');
    }

    public function category($cateid)
    {
      $items = Item::where('cate_id', $cateid)->get();
  // dd($item);
      $item_cate = Category::findOrFail($cateid);

      return view('admin.items.category', [
        'items' => $items,
        'category' => $item_cate,
      ]);
    }


}
