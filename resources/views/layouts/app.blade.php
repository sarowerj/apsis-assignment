<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('resources/fontawesome-free-5.15.4-web/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container-fluid">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        APSIS
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><a href="javascript:void(0)" data-toggle="modal" data-target="#createNewTask"><i class="fas fa-plus"></i></a></li>
                        <li><a href="{{ route('login') }}"><i class="fas fa-palette"></i></a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>



    <!-- Modal -->
    <div class="modal fade" id="createNewTask" tabindex="-1" role="dialog" aria-labelledby="createNewTaskLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="row">
                        <div class="col-xs-4">
                            <h4 class="modal-title" id="createNewTaskLabel">Create New Task</h4>
                        </div>
                        <div class="col-xs-7">
                            <div class="color-pallet">
                                <a href="javascript:void(0)" class="yellow">
                                    <i class="fas fa-sticky-note"></i>
                                </a>
                                <a href="javascript:void(0)" class="green">
                                    <i class="fas fa-sticky-note"></i>
                                </a>
                                <a href="javascript:void(0)" class="cyan">
                                    <i class="fas fa-sticky-note"></i>
                                </a>
                                <a href="javascript:void(0)" class="purple">
                                    <i class="fas fa-sticky-note"></i>
                                </a>
                                <a href="javascript:void(0)" class="magenda">
                                    <i class="fas fa-sticky-note"></i>
                                </a>
                                <a href="javascript:void(0)" class="red">
                                    <i class="fas fa-sticky-note"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <input type="text" name="taskType" id="taskType" maxlength="22" placeholder="Task Type" class="form-control">
                        </div>
                        <div class="form-group">
                            <textarea name="taskDetails" id="taskDetails" rows="10" placeholder="Task Details" class="form-control"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>