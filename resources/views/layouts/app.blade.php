<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/toastr.min.css')}}">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <!-- validation Errors -->
            
                @if($errors->count()>0)
                <ul class="list-group-item">
                    @foreach($errors->all() as $error)
                    <li class="list-group-item text-danger">
                        {{ $error }}
                    </li>
                    @endforeach
                </ul>
                <br>
                <br>
                @endif

        <!-- end of validation errors -->
        <div class="container">
            <div class="col-md-4">
                
                <a href="{{route('discussions.create')}}" class="btn form-control btn-primary">
                    Create A New Discussion
                </a>
                <br><br>
                <!-- useful Links -->
                <div class="panel panel-default">

                    <div class="panel-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="/forum" style="text-decoration: none;">HOME</a>
                            </li>
                            <li class="list-group-item">
                                <a href="/forum?filter=me" style="text-decoration: none;">My Discussions</a>
                            </li>
                            <li class="list-group-item">
                                <a href="/forum?filter=answered" style="text-decoration: none;">Answered</a>
                            </li>
                            <li class="list-group-item">
                                <a href="/forum?filter=unanswered" style="text-decoration: none;">UnAnswered</a>
                            </li>
                        </ul>
                    </div>
                    @if(Auth::check())
                        @if(Auth::user()->admin)
                            <div class="panel-body">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="/channels" style="text-decoration: none;">All channels</a>
                                </li>
                                
                            </ul>
                        </div>
                        @endif
                    @endif
                </div>
                

                <div class="panel panel-default">

                    <div class="panel-heading">
                        Channels
                    </div>

                    <div class="panel-body">
                        <ul class="list-group">
                            @foreach($channels as $channel)
                                <li class="list-group-item">
                                    <a href="{{route('channel',['slug'=>$channel->slug])}}" style="text-decoration: none;">
                                        {{$channel->title}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-8">
                 @yield('content')   
            </div>
            
            
        </div>
        
    </div>
    
    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script type="text/javascript" src="{{asset('js/toastr.min.js')}}"></script>
    <script>
        @if(Session::has('success'))
            toastr.success("{{Session::get('success')}} ")
        @endif
    </script>
    <script>
        @if(Session::has('info'))
            toastr.info("{{Session::get('info')}} ")
        @endif
    </script>
</body>
</html>
