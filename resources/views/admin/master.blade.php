<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Game portal</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
          type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('plugins/node-waves/waves.css')}}" rel="stylesheet"/>

    <link href="{{ asset('plugins/animate-css/animate.css')}}" rel="stylesheet"/>

    <!-- Bootstrap Select Css -->
    <link href="{{ asset('plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet"/>

    <!-- Custom Css -->
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('css/my_style.css')}}" rel="stylesheet">


    <link href="{{ asset('plugins/jquery-datatable/skin/bootstrap/css/dataTables.css')}}" rel="stylesheet"/>

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('css/themes/all-themes.min.css')}}" rel="stylesheet"/>

    <!-- TinyMCE Plugin Js and initialization-->
    <script src="{{ asset('plugins/tinymce/tinymce.min.js')}}"></script>

    <script type="text/javascript">
        tinyMCE.init({
            mode: "textareas",
        });
    </script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
    <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/2.4.1/lodash.min.js"></script>
    <script>
        _u = _.noConflict(); // lets call ourselves _u
    </script>

    <style>
        .select2 li {
            width: 200px;
            word-wrap: break-word;
        }
    </style>
</head>

<body class="theme-blue-grey">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>

<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse"
               data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="/">Admin Dashboard</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="javascript:void(0);" class="js-search" data-close="true"><i
                                class="material-icons">search</i></a></li>
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <i class="material-icons">notifications</i>
                        <span class="label-count">7</span>
                    </a>
                    <ul class="dropdown-menu" style="margin-top: 16px !important;">
                        <li class="header">NOTIFICATIONS</li>
                        <li class="footer">
                            <a href="javascript:void(0);" class=" waves-effect waves-block">View All Notifications</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <i class="material-icons">more_vert</i>
                    </a>
                    <ul class="dropdown-menu" style="margin-top: 16px !important;">
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<section>
    <aside id="leftsidebar" class="sidebar">
        <div class="user-info">
            <div class="image">
                <img src="/storage/image/user.png"
                     width="48" height="48" alt="User">
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true"
                     aria-expanded="false">{{ Auth::user()->first_name ." ". Auth::user()->last_name}}</div>
                <div class="email">{{Auth::user()->email}}</div>
                <div class="btn-group user-helper-dropdown">


                </div>
            </div>
        </div>
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li class="">
                    <a href="{{ route('home') }}">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>
                {{--                @if( Auth::user()->role->name == 'admin')--}}
                <li>
                    <a href="#" class="menu-toggle">
                        <i class="material-icons">people</i>
                        <span>Users</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{ route('user.index') }}">All users</a>
                        </li>
                        <li>
                            <a href="{{ route('user.create') }}">Create user</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="menu-toggle">
                        <i class="material-icons">comment</i>
                        <span>Support</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{ route('ticket.index') }}">Tickets</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="menu-toggle">
                        <i class="material-icons">games</i>
                        <span>Games</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{ route('game.index') }}">All games</a>
                        </li>
                        <li>
                            <a href="{{ route('game.create') }}">Create game</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="menu-toggle">
                        <i class="material-icons">usb</i>
                        <span>Mods</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{ route('mod.index') }}">All mods</a>
                        </li>
                        <li>
                            <a href="{{ route('mod.create') }}">Create mod</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="menu-toggle">
                        <i class="material-icons">desktop_windows</i>
                        <span>Machines</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{ route('machine.index') }}">All machines</a>
                        </li>
                        <li>
                            <a href="{{ route('machine.create') }}">Create machine</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="menu-toggle">
                        <i class="material-icons">toc</i>
                        <span>Servers</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{ route('server.index') }}">All servers</a>
                        </li>
                        <li>
                            <a href="{{ route('server.create') }}">Create server</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="menu-toggle">
                        <i class="material-icons">local_offer</i>
                        <span>Orders</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{ route('order.index') }}">All orders</a>
                        </li>
                    </ul>
                </li>
                {{--                @endif--}}

            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; {{\Carbon\Carbon::today()->format('Y')}} <a href="javascript:void(0);">SSladic</a>.
            </div>
            <div class="version">
                <b>Version: </b> 1.0.0
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
        </div>
        <div class="row clearfix">
            @yield('content')
        </div>
    </div>
</section>

<!-- Jquery Core Js -->
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.js')}}"></script>

<!-- Select Plugin Js -->
<script src="{{ asset('plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{ asset('plugins/node-waves/waves.js')}}"></script>

<!-- TinyMCE Plugin Js and initialization-->
<script src="{{ asset('plugins/tinymce/tinymce.min.js')}}"></script>

<script type="text/javascript">
    tinyMCE.init({
        mode: "textareas"
    });
</script>

<!-- Custom Js -->
<script src="{{ asset('js/admin.js')}}"></script>

<script src="{{ asset('js/script.js')}}"></script>
<script src="{{ asset('plugins/bootstrap-notify/bootstrap-notify.js')}}"></script>
<script src="{{ asset('js/pages/ui/notifications.js')}}"></script>
<script src="{{ asset('plugins/nestable-master/jquery.nestable.js')}}"></script>
<!-- Slimscroll Plugin Js -->
<script src="{{ asset('plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
<script src="{{ asset('plugins/jquery-inputmask/jquery.inputmask.bundle.js')}}"></script>
<script src="{{ asset('plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
<script src="{{ asset('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
<script src="{{ asset('plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
<script src="{{ asset('plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
<script src="{{ asset('plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
<script src="{{ asset('plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
<script src="{{ asset('plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
<script src="{{ asset('plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>
<script>


</script>
</body>
</html>
