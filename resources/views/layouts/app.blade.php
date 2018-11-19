<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">

    <script src="https://js.stripe.com/v3/"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>

<body>

    <div id="app">


          <div class="is-complete">

           <!-- Start Navbar -->

           <nav class="navbar" role="navigation" aria-label="main navigation">
                  <div class="navbar-brand">
                      <a class="navbar-item" href="https://bulma.io">
                          <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
                      </a>

                      <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                          <span aria-hidden="true"></span>
                          <span aria-hidden="true"></span>
                          <span aria-hidden="true"></span>
                      </a>
                  </div>

                  <div id="navbarBasicExample" class="navbar-menu">
                      <div class="navbar-start">
                          <a class="navbar-item">
                              Home
                          </a>

                          <a class="navbar-item">
                              Documentation
                          </a>

                          <div class="navbar-item has-dropdown is-hoverable">
                              <a class="navbar-link">
                                  More
                              </a>

                              <div class="navbar-dropdown">
                                  <a class="navbar-item">
                                      About
                                  </a>
                                  <a class="navbar-item">
                                      Jobs
                                  </a>
                                  <a class="navbar-item">
                                      Contact
                                  </a>
                                  <hr class="navbar-divider">
                                  <a class="navbar-item">
                                      Report an issue
                                  </a>
                              </div>
                          </div>
                      </div>

                      @if(\Illuminate\Support\Facades\Auth::guest())
                      <div class="navbar-end">
                          <div class="navbar-item">
                              <div class="buttons">
                                  <a class="button is-primary" href="{{ route('register') }}">
                                      <strong>Sign up</strong>
                                  </a>
                                  <a class="button is-light" href="{{ route('login') }}">
                                      Log in
                                  </a>
                              </div>
                          </div>
                      </div>

                     @else

                          <div class="navbar-item has-dropdown is-hoverable">
                              <a class="navbar-link">
                                  {{ \Illuminate\Support\Facades\Auth::user()->name }}
                              </a>

                               <div class="navbar-dropdown">
                                   <a class="navbar-item" href="{{ route('account::index') }}">
                                       Me
                                   </a>
                                  <form method="post" action="{{ route('logout') }}">
                                      @csrf
                                      <a class="navbar-item" onclick="document.querySelectorAll('form')[0].submit()">
                                      Logout
                                      </a>
                                  </form>
                              </div>
                          </div>

                      @endif

                  </div>
              </nav>

              <!-- End Navbar -->

          </div>


        @yield("content")

    </div>


    @if(\Illuminate\Support\Facades\Auth::check())
        <script type="application/javascript">

            window.laravel = {!!  json_encode([
                "csrf_token"=>csrf_token(),
                "Checkout"=>route('Checkout.store'),
                "Article"=>route("Article.index"),
                "ArticlePost"=>route("Article.store"),
                "Session_stripe"=>\Illuminate\Support\Facades\Session::get("stripe"),

          ]) !!}

        </script>
    @endif

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


</body>

</html>
