<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description')">
    <meta name="csrf-token" content="{{ csrf_token() }}" />


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


    <title>@yield('title')</title>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>


    <!-- Angular stuff -->
    <script src="https://code.angularjs.org/1.4.7/angular.min.js"></script>
    <script src="https://code.angularjs.org/1.4.7/angular-route.min.js"></script>
    <script src="https://code.angularjs.org/1.4.7/angular-animate.min.js"></script>
    <script src="https://code.angularjs.org/1.4.7/angular-aria.min.js"></script>



    {{-- Material Ui--}}
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/0.10.0/angular-material.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/angular_material/0.10.0/angular-material.min.js"></script>


    {{-- fonts and icons --}}
    <link href="//fonts.googleapis.com/css?family=Lato:300" rel="stylesheet" type="text/css">
    {{--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=RobotoDraft:300,400,500,700,400italic">--}}
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">


    {{--boot strap4 --}}
    <link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css">
    <script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js"></script>

    <!-- Include Bootstrap-select CSS, JS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/css/bootstrap-select.min.css" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/js/bootstrap-select.min.js"></script>

    {{-- in house code --}}
    <script src="/js/global.js"></script>
    <script src="/js/chart.min.js"></script>
    <script src="/app/js/ng_app.js"></script>
    <script src="/app/bills/BillController.js"></script>
    <script src="/app/creditcards/CreditCardController.js"></script>
    <script src="/app/spendableChart/SpendableChartController.js"></script>

    <script src="/vendors/angular-chart/angular-chart.min.js"></script>
    <link rel="stylesheet" href="/vendors/angular-chart/angular-chart.min.css">


    <link rel="stylesheet" href="/css/global.css" >
    <link rel="stylesheet" type="text/css" href="/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="/css/component.css" />
    <link rel="stylesheet" href="/css/angular_animation.css">

    <link rel="stylesheet" href="/css/jumbotron-narrow.css">

    <script src="/js/modernizr.min.js"></script>

    {{-- Vendors --}}
    <link rel="stylesheet" href="/vendors/mfb/mfb.css">
    <script src="/vendors/mfb/mfb-directive.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>

  </head>

<body ng-app="App">
     <nav class="navbar navbar-fixed-top white_bg">
      <div class="container">
            <a class="navbar-brand" href="/">Moneyburi</a>
            <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#navbar-header">
              &#9776;
            </button>

           <div class="collapse navbar-toggleable-xs" id="navbar-header">
              <ul class="nav navbar-nav pull-left">
                <li class="nav-item">


                </li>
              </ul>
              <ul class="nav navbar-nav pull-right">

                @if(Auth::user())
                    <li class="nav-item" ng-controller="profileController">
                        <a class="nav-link" href="#profile">
                                <span><img src="@{{ userData.avatar? userData.avatar : '/img/user_avatar.gif' }}"
                                 class="img-circle img-responsive pull-left" width="30px">
                            Profile</span>
                        </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/logout">log out</a>
                    </li>
                @else
                    <li class="nav-item">
                      <a class="nav-link" href="/register">Register</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/login">Login</a>
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

    <script src="/js/global.interact.js"></script>

</html>