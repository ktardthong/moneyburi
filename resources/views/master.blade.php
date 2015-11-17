<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta name="description" content="@yield('description')">
    <link rel="icon" href="/favicon.ico">
    <meta name="theme-color" content="#ffffff">
    <meta name="csrf-token" content="{!! csrf_token() !!}">

    <title>@yield('title')</title>


    {{-- BOWER, for anything is from vendors and might have update in the future --}}
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/angular/angular.min.js"></script>
    <script src="bower_components/moment/min/moment.min.js"></script>
    <script src="bower_components/moment/min/moment-with-locales.min.js"></script>
    <script src="bower_components/angular-material/angular-material.min.js"></script>
    <script src="bower_components/angular-route/angular-route.min.js"></script>
    <script src="bower_components/angular-aria/angular-aria.min.js"></script>
    <script src="bower_components/angular-animate/angular-animate.min.js"></script>


    {{--Alpha Boot strap4 --}}
    <link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css">
    <script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js"></script>

    {{-- Versioning for our custom ng-js --}}
    <script src="{!! elixir('js/all.js') !!}"></script>

    {!! Minify::javascriptDir('/js/vendors/') !!}

    {{-- Vendors for JS and CSS--}}
    {!! Minify::javascriptDir('/vendors/') !!}
    {!! Minify::stylesheetDir('/vendors/') !!}



    <link rel="stylesheet" href="/css/app.css">
  </head>

<body>
     <nav class="navbar navbar-fixed-top header-mb">
      <div class="container">
            <a class="navbar-brand" href="/"> moneymore<small>.xyz</small> </a>
            <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#navbar-header">
              &#9776;
            </button>

           <div class="collapse navbar-toggleable-xs" id="navbar-header">

              <ul class="nav navbar-nav pull-right">

                <li class="nav-item">
                    <div class="btn-group">
                        <button type="button" class="btn btn-link">
                            <a href="#">{!! !empty(session('applocale'))?session('applocale'):'en' !!}</a>
                        </button>
                        <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Dropdown</span>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/lang/en">English</a>
                            <a class="dropdown-item" href="/lang/th">ภาษาไทย</a>
                        </div>
                    </div>
                </li>

                @if(Auth::user())

                    <li class="nav-item">
                        <div class="btn-group">
                          <button type="button" class="btn btn-link">
                            <a href="/profile">
                                <img
                                     src="<?= !empty(Auth::user()->avatar)?'/userimg/'.Auth::user()->avatar:"/img/user_avatar.gif"?>"
                                     class="img-responsive pull-left" width="30px">&nbsp;<?=Auth::user()->firstname?>
                            </a>
                           </button>
                          <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="/profile">{!! trans('messages.lbl_home') !!}</a>
                            <a class="dropdown-item" href="/user">{!! trans('messages.lbl_setting') !!}</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/logout">{!! trans('messages.lbl_logout') !!}</a>
                          </div>
                        </div>
                    </li>

                @else
                    <li class="nav-item">
                      <a class="nav-link" href="/register">{!! trans('messages.lbl_register') !!}</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/login">{!! trans('messages.lbl_login') !!}</a>
                    </li>
                @endif
              </ul>
           </div>
      </div>
    </nav>



    @yield('content')



    <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-68665611-1', 'auto');
      ga('send', 'pageview');

    </script>

</body>

</html>


