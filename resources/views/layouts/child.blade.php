<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="dns-prefetch" href="https://fonts.gstatic.com"> 
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    
    <script src="{{ secure_asset('js/app.js') }}" defer></script>
    
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/calendar.css') }}" rel="stylesheet">

    <title>@yield('title')</title>
  </head>
  <body>  
    <div>
      <div class="col-2 my-4">
        <a href="{{ action('Child\ChildController@index') }}" role="button" class="btn btn-info btn-block">Home</a>
      </div>
      
      <main>
        @yield('content')
      </main>
    </div>
  </body>
</html>