<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properties -->
  <title>@yield('title') &#187; - Techphin </title>
  <link href='https://fonts.googleapis.com/css?family=Lora:700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="semantic/semantic.min.css">
  <link rel="stylesheet" href="https://cdn.rawgit.com/konpa/devicon/master/devicon.min.css">
  <link rel="stylesheet" type="text/css" href="{!! resolve_asset('css/main.css') !!}">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.min.js"></script>
  <script src="semantic/semantic.min.js"></script>
  <script src="{!! resolve_asset('js/page.js') !!}"></script>
  @yield('styles')
</head>
<body>
<style>
    #videos-list {
        padding: 6em 0em;
    }
</style>
  <!-- Page Contents -->
    <div class="pusher">
        <div class="ui fixed top borderless menu" id="navBarContext">
            <div class="ui container">
                <a class="item" id="logo-text" href="{{ url("/") }}">
                    <h1>Techphin</h1>
                </a>
                <div class="item" id="search">
                    <div class="ui icon input">
                        <input type="text" placeholder="Search...">
                        <i class="search link icon"></i>
                    </div>
                </div>

                <div class="right menu">
                    <div class="item">
                        <a class="ui blue button" href="{{ url('/user/upload') }}">Upload </a>
                    </div>
                    @if (auth()->user())
                        <div class="ui dropdown pointing item" >
                            {{  auth()->user()->username }}
                            <img class="ui avatar image" src="{{ auth()->user()->image }}">
                            <i class="dropdown icon"></i>
                            <div class="menu">
                              <div class="item">
                                  <i class="icon dashboard"></i>
                                  <a href="{{ url('user/dashboard') }}">Dashboard</a>
                              </div>
                              <div class="item">
                                  <i class="icon sign out"></i>
                                  <a href="{{ url('logout') }}">Logout</a>
                              </div>
                            </div>
                        </div>
                    @else
                        <div class="item">
                            <a class="ui blue basic button" href="{{ url('/login') }}">Login </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="ui vertical segment secondary" id="videos-list">
            <div class="ui container">
                <div class="ui stackable equal height stackable grid">
                    @include('partials.categories')
                    @yield('content')
                </div>
            </div>
        </div>
        @include('partials.footer')
    </div>
    @yield('scripts')
</body>
</html>