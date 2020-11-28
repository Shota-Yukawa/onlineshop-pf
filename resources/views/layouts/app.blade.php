<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Rots Mrc</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="{{ asset('css/start.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}"> -->
    <link rel="stylesheet" href="css/start.css">
    <link rel="stylesheet" href="css/main.css">

  </head>
  <body>

     {{--ヘッダー--}}
     @include('commons.header')

     <div class="conteiner">
       {{--エラーメッセージ--}}
       <div class="container-fluid">
         <div class="row">
           <div class="col-sm-3 sidebar">
       @include('commons.sidebar')
           </div>

           <div class="col-sm-9 main">
       @yield('content')
           </div>
         </div>
       </div>

     </div>

     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
     <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>

  </body>
</html>
