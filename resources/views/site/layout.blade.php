<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/css/content.css')}}">

</head>
<body>

    <header>
        <nav class="navbar navbar-expand-sm navbar-light navbar-transparente">
           <div class="container">
  
             <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-principal">
               <SPAN class="navbar-toggler-icon"></SPAN>
             </button>
  
             <div class="collapse navbar-collapse justify-content-center" id="nav-principal">
                <ul class="navbar-nav ml-auto bold">

                    @foreach($front_menu as $menuslug => $menutitle)
                        <li class="nav-item">
                            <a href="{{$menuslug}}" class="nav-link">{{$menutitle}}</a>
                        </li>
                    @endforeach
      
                    <li class="nav-item divisor">
                      
                    </li>
      
                    <li class="nav-item">
                      <a href="" class="nav-link">Inscrever-se</a>
                    </li>
                    <li class="nav-item">
                      <a href="" class="nav-link">Entrar</a>
                    </li>
                  </ul>
             </div>
           </div>
        </nav>

    <div class="container-fluid">
        @yield('content')
    </div>

    

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>