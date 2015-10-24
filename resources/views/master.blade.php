<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description')">

    <link rel="icon" href="/favicon.ico">
    <link rel="apple-touch-icon" sizes="57x57" href="/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="manifest" href="/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta name="csrf-token" content="{!! csrf_token() !!}">

    <title>@yield('title')</title>

    {!! Minify::javascript(array('/js/jquery.min.js')) !!}


  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    {{-- Angular --}}
    {!! Minify::javascript( array(  '/js/angular.min.js','/js/angular-route.min.js','/js/angular-animate.min.js',
                                    '/js/angular-aria.min.js','/js/angular-sanitize.min.js',
                                    '/js/ng_app.js',
                                    '/js/ng_factory.js',
                                    '/js/controllers/BillController.js',
                                    '/js/controllers/CreditCardController.js',
                                    '/js/controllers/GoalBuyingController.js',
                                    '/js/controllers/GoalController.js',
                                    '/js/controllers/GoalTravelController.js',
                                    '/js/controllers/SpendableChartController.js',
                                    '/js/controllers/userController.js',
                                  )) !!}
     <script src="https://ajax.googleapis.com/ajax/libs/angular_material/0.11.2/angular-material.min.js"></script>
    {!! Minify::javascript(array('/js/gmap.js','/js/global.js')) !!}
    {!! Minify::javascriptDir('/js/vendors/') !!}

    {{-- Vendors for JS and CSS--}}
    {!! Minify::javascriptDir('/vendors/') !!}
    {!! Minify::stylesheetDir('/vendors/') !!}


    {{--boot strap4 --}}
    <link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css">
    <script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js"></script>

    <script src="/app/transactions/TransactionsController.js"></script>

    <script>
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
    </script>


  </head>

<body ng-app="App">
     <nav class="navbar navbar-fixed-top header-mb">
      <div class="container">
            <a class="navbar-brand" href="/"> mana </a>
            <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#navbar-header">
              &#9776;
            </button>

           <div class="collapse navbar-toggleable-xs" id="navbar-header">
              <ul class="nav navbar-nav pull-left">
                <li class="nav-item">


                </li>
              </ul>
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


    <div class="container">

	    @yield('content')

	</div>


</body>


{!! Minify::stylesheet(array('/css/angular-material.min.css',
                                 '/css/ionicons.min.css',
                                 '/css/font-awesome.min.css',
                                 '/css/normalize.css',
                                 '/css/component.css',
                                 '/css/angular_animation.css',
                                 '/css/jumbotron-narrow.css',
                                 '/css/global.css',
                                 )) !!}

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-68665611-1', 'auto');
  ga('send', 'pageview');

</script>


</html>


