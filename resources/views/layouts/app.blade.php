<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="{{ URL::asset('css/style.css')}}" rel="stylesheet">
   
</head>
<body id="app-layout">

        
    <div class="container">
    
    <ul class="nav justify-content-center" style="background-color: gray;" id="menu">
      <li class="nav-item">
        <a class="nav-link"  style="color: white;" href="{{ action('ProductsController@index') }}">Home - lista produktów</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  style="color: white;" href="{{ action('ProductsController@create') }}">Dodaj produkt</a>
      </li>
    </ul>
        
        @yield('content')

    


    
        <!-- Footer -->
        <footer class="site-footer" style="background-color: gray; color: white;">
            <p>&copy; Project Products</p>
        </footer>
    </div>

    <!-- JavaScripts -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
