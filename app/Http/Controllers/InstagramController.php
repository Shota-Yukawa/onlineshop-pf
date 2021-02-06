<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Controllers\Controller;

class InstagramController extends Controller
{

  public function index()
  {
  }

  public function insta()
  {
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
       'posts' => $posts
     ]);
  }

  public function hashtag()
  {
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
       'posts' => $posts
     ]);
  }


}
