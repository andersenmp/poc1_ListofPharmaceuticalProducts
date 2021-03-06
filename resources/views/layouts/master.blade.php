<!DOCTYPE html>
<html lang="en">
<head>
    <title>EEAS - POC Php/Laravel @yield('title')</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">



    <!-- Latest compiled and minified CSS -->

    <!-- Kendo UI CSS  -->
    <link rel="stylesheet" href="{{ asset('resources/lib/kendoui/styles/kendo.common-bootstrap.min.css')}}">>
    <link rel="stylesheet" href="{{ asset('resources/lib/kendoui/styles/kendo.bootstrap.min.css')}}">>


    <!-- Bootstrap CSS  -->
    <link rel="stylesheet" href="{{ asset('resources/lib/bootstrap/css/bootstrap.min.css')}}">>
    <link rel="stylesheet" href="{{ asset('resources/lib/bootstrap-validator/dist/css/bootstrapValidator.min.css')}}">>


    <!-- Font Awsome CSS  -->
    <link rel="stylesheet" href="{{ asset('resources/lib/font-awesome/css/font-awesome.css')}}">

    <!-- Bootstrap Kendo UI CSS  -->
    <link rel="stylesheet" href="{{ asset('resources/lib/kendoui/integration/bootstrap/css/styles.css')}}">

    <!-- Toast notifications -->
    <link rel="stylesheet" type="text/css" href="{{ asset('resources/lib/jquery-toastr/toastr.min.css')}}">

    @yield('extraCSSFiles')

    <!-- Application CSS - Include with every page -->
    <link rel="stylesheet" href="{{ asset('resources/css/main.css')}}">>
    <link rel="stylesheet" href="{{ asset('resources/css/tasks.css')}}">>

    <!--[if lt IE 9]>
    <script src="{{ asset('resources/lib/kendoui/integration/bootstrap/js/html5shiv.js')}}">></script>
    <script src="{{ asset('resources/lib/kendoui/integration/bootstrap/js/respond.min.js')}}">></script>
    <![endif]-->

</head>

<body>
<header class="main">
    <a href="{{ route('home') }}" id="logo">
        <img src="{{ asset('resources/images/eeas.png')}}" alt="EEAS">
        <span>
        <i>e</i>-POC Php/Laravel
      </span>
        <sup>Proof of concept</sup>
    </a>
    <nav>
        <ul class="dropdown">
            <li id="show-tasks">
                <i class="glyphicon glyphicon-calendar"></i>
                <span id="exceeded-count-badge" class="badge red">2</span>
                <span id="tasks-count-badge" class="badge green left">5</span>
                <div class="arrow"></div>
            </li>

            <li id="" data-placement="bottom" title="Notifications" data-content="You currently don't have any notifications"><i class="glyphicon glyphicon-envelope"></i> <span class="badge blue">24</span></li>
            <li class="user">
                <div data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i>
                    <span class="name">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span> <b class="caret"></b>
                </div>

                @auth
                <ul class="dropdown-menu">
                    <li class="languages has-label">
                        <label>Language</label>
                        <ul>
                            <li><strong class="tt" data-toggle="tooltip" title="English">EN</strong></li>
                            <li><a href="#" class="tt" data-toggle="tooltip" title="Français">FR</a></li>
                            <li><a href="#" class="tt" data-toggle="tooltip" title="Deutsch">DE</a></li>
                        </ul>
                    </li>
                    <li><a href="#help"><i class="glyphicon glyphicon-question-sign"></i> Help</a></li>
                    <li><i class="glyphicon glyphicon-wrench"></i>Preferences</li>
                    <li><i class="glyphicon glyphicon-info-sign"></i>Privacy statement</li>
                    <li><i class="glyphicon glyphicon-info-sign"></i>Confidentiality statement</li>
                    <li>
                        <a href="{{ route('Cas.logout') }}">
                            <i class="glyphicon glyphicon-log-out"></i>Log out
                        </a>
                    </li>
                </ul>
                @endauth
            </li>
        </ul>
    </nav>
</header>

<div id="show-menu"><i></i></div>

<div id="hide-menu"></div>


@if(!empty(Session::get('sentry')))
<nav class="main">
    <div id="sticky"><i class="glyphicon glyphicon-pushpin sticky tt" title="Make this menu sticky" data-placement="right"></i></div>


    <ul class="list-group">
        <li><a href="{{ route('home') }}">Home</a></li>

        @if(Session::get('sentry')->hasAccessToFeature('/ADMINISTRATOR'))
        <li><div class="item">CISLA <b class="caret"></b></div>
            <ul>
                <li>
                <a href="{{ route('ListofPharmaceuticalProducts.home') }}">List of Pharmaceutical Products</a>
                </li>
            </ul>
        </li>
        @endif

    </ul>
</nav>
@endif

<main class="container-fluid" ui-view>
    @yield('content')
</main>


<footer class="main">
    <div class="copyright">Built <span>and maintained</span> by EEAS IT DIVISION <span>– Information Systems Section</span></div>
    Version 0.0.0 - 27/03/2018
</footer>


<!-- Core JS - Include with every page -->
<script src="{{ asset('resources/lib/jquery/jquery-1.11.0.min.js')}}">></script>
<script src="{{ asset('resources/lib/kendoui/js/kendo.dataviz.min.js')}}">></script>
<script src="{{ asset('resources/lib/kendoui/js/kendo.all.min.js')}}">></script>
<script src="{{ asset('resources/lib/bootstrap/js/bootstrap.min.js')}}">></script>
<script src="{{ asset('resources/lib/bootstrap-validator/dist/js/bootstrapValidator.min.js')}}">></script>
<script src="{{ asset('resources/lib/jquery-cookie/jquery.cookie.js')}}">></script>
<script src="{{ asset('resources/lib/jquery-touchswipe/jquery.touchSwipe.min.js')}}">></script>
<script src="{{ asset('resources/lib/jquery-placeholder/jquery.placeholder.min.js')}}">></script>
<script src="{{ asset('resources/lib/jquery-expanding/jquery.expanding.js')}}">></script>
<script src="{{ asset('resources/lib/jquery-toastr/toastr.min.js')}}">></script>
<script src="{{ asset('resources/lib/bootstrap-multiselect/bootstrap-multiselect.js')}}">></script>
<script src="{{ asset('resources/js/mobile.js')}}">></script>
<script src="{{ asset('resources/js/popup.js')}}">></script>
<script src="{{ asset('resources/js/main.js')}}">></script>

<!-- Internationalization -->
<script src="{{ asset('resources/js/i18n/en.js')}}">></script>
<script src="{{ asset('resources/js/i18n.js')}}">></script>

@yield('extraJSFiles')


@yield('extraJSScript')


</body>
</html>




