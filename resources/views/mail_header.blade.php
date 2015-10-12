<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


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
    <link href="https://fonts.googleapis.com/css?family=Lato:300" rel="stylesheet" type="text/css">
    {{--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=RobotoDraft:300,400,500,700,400italic">--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">


    {{--boot strap4 --}}
    <link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css">
    <script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js"></script>

    <!-- Include Bootstrap-select CSS, JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/css/bootstrap-select.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/js/bootstrap-select.min.js"></script>

    {{-- in house code --}}

    <script src="https://www.moneyburi.com/js/global.js"></script>
    <script src="https://www.moneyburi.com/js/chart.min.js"></script>
    <script src="https://www.moneyburi.com/app/js/ng_app.js"></script>
    <script src="https://www.moneyburi.com/app/bills/BillController.js"></script>
    <script src="https://www.moneyburi.com/app/creditcards/CreditCardController.js"></script>
    <script src="https://www.moneyburi.com/app/spendableChart/SpendableChartController.js"></script>

    <script src="https://www.moneyburi.com/vendors/angular-chart/angular-chart.min.js"></script>
    <link rel="stylesheet" href="https://www.moneyburi.com/vendors/angular-chart/angular-chart.min.css">


    <link rel="stylesheet" href="https://www.moneyburi.com/css/global.css" >
    <link rel="stylesheet" type="text/css" href="https://www.moneyburi.com/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="https://www.moneyburi.com/css/component.css" />
    <link rel="stylesheet" href="https://www.moneyburi.com/css/angular_animation.css">

    <link rel="stylesheet" href="https://www.moneyburi.com/css/jumbotron-narrow.css">

    <script src="https://www.moneyburi.com/js/modernizr.min.js"></script>

    {{-- Vendors --}}
    <link rel="stylesheet" href="https://www.moneyburi.com/vendors/mfb/mfb.css">
    <script src="https://www.moneyburi.com/vendors/mfb/mfb-directive.js"></script>
    <script src="https://www.moneyburi.com/js/global.interact.js"></script>

  </head>

<body ng-app="App">
	    @yield('content')
</body>

</html>