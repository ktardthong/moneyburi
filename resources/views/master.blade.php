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


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>


    <!-- Angular stuff -->
    <script src="https://code.angularjs.org/1.4.7/angular.min.js"></script>
    <script src="https://code.angularjs.org/1.4.7/angular-route.min.js"></script>
    <script src="https://code.angularjs.org/1.4.7/angular-animate.min.js"></script>
    <script src="https://code.angularjs.org/1.4.7/angular-aria.min.js"></script>
    <script src="/angular/angular-sanitize.min.js"></script>


    {{-- Material Ui--}}
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/0.11.1/angular-material.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/angular_material/0.11.1/angular-material.min.js"></script>


    {{-- fonts and icons --}}
    <link href="//fonts.googleapis.com/css?family=Lato:300" rel="stylesheet" type="text/css">


    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" type="text/css" rel="stylesheet">
    {{-- http://materializecss.com/navbar.html --}}
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Compiled and minified CSS -->
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">--}}


    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>

    {{--boot strap4 --}}
    <link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css">
    <script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js"></script>

    <!-- Include Bootstrap-select CSS, JS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/css/bootstrap-select.min.css" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/js/bootstrap-select.min.js"></script>

    {{-- Moment.js --}}
    <script src="http://momentjs.com/downloads/moment-with-locales.js"></script>
    {{-- nummeral--}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/1.4.5/numeral.min.js"></script>


    {{-- in house code --}}
    <script src="/js/global.js"></script>
    <script src="/js/chart.min.js"></script>
    <script src="/app/js/ng_app.js"></script>
    <script src="/app/js/ng_factory.js"></script>
    <script src="/app/bills/BillController.js"></script>
    <script src="/app/creditcards/CreditCardController.js"></script>
    <script src="/app/spendableChart/SpendableChartController.js"></script>
    <script src="/app/account/userController.js"></script>
    <script src="/app/transactions/TransactionsController.js"></script>
    <script src="/app/goal/travel/GoalTravelController.js"></script>
    <script src="/app/goal/buying/GoalBuyingController.js"></script>


    <script src="/vendors/angular-chart/angular-chart.min.js"></script>
    <link rel="stylesheet" href="/vendors/angular-chart/angular-chart.min.css">

    <script src="/vendors/angular-autocomplete/ngAutocomplete.js"></script>
    <link rel="stylesheet" href="/vendors/angular-autocomplete/angucomplete.css">

    <link rel="stylesheet" href="/css/global.css" >
    <link rel="stylesheet" type="text/css" href="/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="/css/component.css" />
    <link rel="stylesheet" href="/css/angular_animation.css">

    <link rel="stylesheet" href="/css/jumbotron-narrow.css">

    <script src="/js/modernizr.min.js"></script>

    {{-- Vendors --}}
    <link rel="stylesheet" href="/vendors/mfb/mfb.css">
    <script src="/vendors/mfb/mfb-directive.js"></script>


    <script src="/vendors/bootstrapSelect/bootstrap-select.min.js"></script>
    <link rel="stylesheet" href="/vendors/bootstrapSelect/bootstrap-select.min.css">


    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
    <script src="http://jvandemo.github.io/angularjs-google-maps/dist/angularjs-google-maps.js"></script>

    {{--<script src="//maps.google.com/maps/api/js"></script>--}}
    <script src="/vendors/ng-map/ng-map.min.js"></script>

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
                            <a class="dropdown-item" href="/profile">Home</a>
                            <a class="dropdown-item" href="/user">Setting</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/logout">Log out</a>
                          </div>
                        </div>
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


    <div class="container" ng-controller="profileController">

	    @yield('content')

	</div>


</body>

<script src="/js/global.interact.js"></script>
<script src="/vendors/ng-autocomplete/ngAutocomplete.js"></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-68665611-1', 'auto');
  ga('send', 'pageview');

</script>


</html>


