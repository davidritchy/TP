<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Banque de données Maisonneuve - @yield('title')
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('assets/style.css') }}">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ route('ville.index') }}">
            Banque de données Maisonneuve
        </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                  Menu
                </button>
                <ul class="dropdown-menu dropdown-menu-dark">
                @auth
                  <li><a class="dropdown-item" href="{{ route('etudiant.index') }}">@lang('Students List')</a></li>
                  <li><a class="dropdown-item" href="{{ route('user.index') }}">@lang('Users List')</a></li>
                  <li><a class="dropdown-item" href="{{ route('profile.create') }}">
                    @lang('Depot')
                  </a></li>
                  <li><a class="dropdown-item" href="{{ route('profile.index') }}">
                    @lang('My Profile')
                  </a></li>
                  @endauth
                  @guest
                  <li><a class="dropdown-item" href="{{ route('login') }}">@lang('Login')</a></li>
                  @else
                  <li><a class="dropdown-item" href="{{ route('logout') }}">@lang('Logout')</a></li>
                  @endguest
                </ul>
              </li>
            </ul>
          </div>
        </div>

        <div class="d-flex  justify-content-around mx-auto p-2">
        <ul class="me-5" style="list-style-type:none;">
        <li><a class="dropdown-item" href="{{ route('lang', 'en') }}">
          @lang('English')
        </a></li>
        <li><a class="dropdown-item" href="{{ route('lang', 'fr') }}">
          @lang('French')
        </a></li>
        </ul>

      </div>
      </nav>
      
     
    </header>
  
    <main >
  
    
    @if(session('success'))    
    <div class="alert alert-warning alert-dismissible fade show ms-2 me-2" role="alert">
  <strong> {{session('success')}}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    @endif  
  
  @yield('content')
</main>
<footer class="container py-3 my-4  ">
    <p class="text-center text-body-primary">
        &copy; {{ date('Y') }} {{ config('app.name') }}. 
        @lang('All Rights Reserved')
    </p>
</footer>
  </body>
</html>