<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;
use App\Models\Cart;
use App\Models\Category;
use GuzzleHttp\Client;


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
      $user = \Auth::user();
  // dd($items);
      return view('user.items.index', [
        'user' => $user,
        'items' => $items,
      ]);
    }

    public function detail($itemid)
    {
      $user = \Auth::user();
      $item = Item::findOrFail($itemid);
      $item_cate = Category::findOrFail($item->cate_id);
      // dd($item_cate);

      return view('user.items.detail', [
        'user' => $user,
        'item' => $item,
        'category' => $item_cate,

      ]);
    }


    public function favorites($userid)
    {
       $user = User::findOrFail($userid);
// dd($user);
       $user->loadRelationshipCounts();

       $favorites = $user->favorites()->paginate(10);
// dd($favorites);
       return view('user.items.favorites', [
           'user' => $user,
           'items' => $favorites,
       ]);
    }
    public function carts($userid)
    {
       $user = User::findOrFail($userid);
       // dd($user);
       $user->loadRelationshipCounts();

       $carts = $user->carts()->paginate(10);

       // foreach ($carts as $cart) {
       //   $item = Item::findOrFail($cart->item_id);
       // }
       // dd($item);
       $total = $user->carts->sum(function($item){
         return $item->price * $item->cart_quantity;
     });

       return view('user.items.carts', [
           'user' => $user,
           'cartitems' => $carts,
           'total' => $total,
       ]);
    }

    public function category($cateid)
    {
      $user = \Auth::user();
      $items = Item::where('cate_id', $cateid)->get();
// dd($item);
      $item_cate = Category::findOrFail($cateid);


      return view('user.items.category', [
        'user' => $user,
        'items' => $items,
        'category' => $item_cate,
      ]);
    }

    public function insta()
    {
      $user = \Auth::user();

      $instagram_business_id = '17841445617498062';
      $access_token = 'EAAK6HWPBotABAOYlBQsnCrfLJrq0MaHCqNCkL5LZCzD79uP0RlpUqpGecwNesj06NuMECR7hZAUxDZA3JqPwpOqWvzOENLVd6tEi41Mqhc0bAGN7RE52iBhwXXLH8DUkrpm43ZA0CriBq5OATB76puG30b4nQaISjxACs9l5ggZDZD';

      $target_user = 'shota.for.os';
      $target_hashtag = '';
      $post_count = 10;
      $method = 'GET';

      $query = 'name,media.limit(' . $post_count. '){caption,like_count,media_url,permalink,timestamp,username,comments_count}';

      $instagram_api_url = 'https://graph.facebook.com/v7.0/';
      $target_url = $instagram_api_url.$instagram_business_id."?fields=".$query."&access_token=".$access_token;


      $client = new Client();
      $response = $client->request($method, $target_url);

      $posts = $response->getBody();
      $posts = json_decode($posts, true);
  // dd($posts);
       return view('instagram.index', [
         'user' => $user,
         'posts' => $posts
       ]);
    }

    public function hashtag()
    {
      $user = \Auth::user();

      $instagram_business_id = '17841445617498062';
      $access_token = 'EAAK6HWPBotABAOYlBQsnCrfLJrq0MaHCqNCkL5LZCzD79uP0RlpUqpGecwNesj06NuMECR7hZAUxDZA3JqPwpOqWvzOENLVd6tEi41Mqhc0bAGN7RE52iBhwXXLH8DUkrpm43ZA0CriBq5OATB76puG30b4nQaISjxACs9l5ggZDZD';
      $target_user = 'shota.for.os';
      $target_hashtag = '';
      $post_count = 2;
      $method = 'GET';
      // $url_hash = 'graph.facebook.com/ig_hashtag_search ?user_id=17841445617498062 &q=RotsMrc';

      $query_hashid = 'ig_hashtag_search?user_id=17841445617498062&q=RotsMrc';

      $instagram_api_url = 'https://graph.facebook.com/v7.0/';
      $target_hashid_url = $instagram_api_url.$query_hashid."&access_token=".$access_token;

      $client_hashid = new Client();
      $response_hashid = $client_hashid->request($method, $target_hashid_url);

      $hash_id = $response_hashid->getBody();
      $hash_id = json_decode($hash_id, true);

      // dd($hash_id);

      $hashid = $hash_id['data'][0]['id'];
      // dd($hashid);

      $query = 'id,caption,children,comments_count,like_count,media_url,permalink,timestamp';
      $target_url = $instagram_api_url.$hashid.'/recent_media?user_id='.$instagram_business_id.'&fields='.$query."&access_token=".$access_token;

      $client = new Client();
      $response = $client->request($method, $target_url);

      $posts = $response->getBody();
      $posts = json_decode($posts, true);

      // dd($posts);

       return view('instagram.hashtag', [
         'user' => $user,
         'posts' => $posts
       ]);
    }




}
