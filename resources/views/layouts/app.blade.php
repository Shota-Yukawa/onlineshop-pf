<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Rots Mrc</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link href="{{ asset('css/start.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/content.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  </head>
  <body>

     {{--ヘッダー--}}
     @include('commons.header')

     <div class="conteiner">
       <div class="container-fluid">
         <div class="row">
           <div class="col-sm-2 sidebar">
            <!-- サイドバー -->
           @include('commons.sidebar')
           </div>
           <div class="col-sm-10 main">
             <div class="" style="margin:10px;">
               {{--エラーメッセージ--}}
               @include('commons.error')
               {{--コンテンツ--}}
               @yield('content')
             </div>
           </div>
         </div>
       </div>
     </div>
     @include('commons.footer')

     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
     <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>

  </body>
</html>
