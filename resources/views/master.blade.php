<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
</head>
<body>

        <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('page.index')}}">Lara Blog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('page.index')}}">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            category
          </a>
          <ul class="dropdown-menu">

          @foreach (\App\Models\Category::all() as $category)
              <li><a class="dropdown-item" href="{{ route('page.category', $category->slag) }}">{{$category->title}}</a></li>
          @endforeach
            
          </ul>
        </li>
        <li class="nav-item">
          @auth
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="{{ route('blog.index') }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{Auth::user()->name}}
          </a>
          <ul class="dropdown-menu">

          <li><a class="nav-link " href="{{ route('home') }}">Home</a></li>
          <li><hr class="dropdown-divider"></li>
          <li>  
          <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
          </li>
            
          </ul>
         
          @else
          <a class="nav-link " href="{{ route('login') }}">Login</a>
          @endauth
        </li>
      </ul>
      
    </div>
  </div>
</nav>

        <section class="my-3">
            @yield('content')
        </section>

        <script src="{{ asset('js/theme.js') }}"></script>
</body>
</html>

 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
