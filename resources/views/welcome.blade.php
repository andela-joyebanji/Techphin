<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properties -->
  <title>Homepage - Techphin </title>
  <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="{!! resolve_asset('semantic/semantic.min.css') !!}">
  <link rel="stylesheet" href="https://cdn.rawgit.com/konpa/devicon/master/devicon.min.css">
  <link rel="stylesheet" type="text/css" href="{!! resolve_asset('css/main.css') !!}">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.min.js"></script>
  <script src="{!! resolve_asset('semantic/semantic.min.js') !!}"></script>
  <script src="{!! resolve_asset('js/home.js') !!}"></script>
</head>
<body>

  <!-- Following Menu -->
  <div class="ui large top fixed borderless hidden menu" id="navBarContext">
    <div class="ui container">
       <a class="item" id="logo-text" href="{{ resolve_url('/') }}">
                    <h1>Techphin</h1>
                </a>
      <form class="ui form item" id="search" method="GET" action="{{ resolve_url('/search')}}">
                    <div class="ui icon input">
                        <input type="text" name="queryString" placeholder="Search...">
                        <i class="search link icon"></i>
                    </div>
                  </form>
      <div class="right menu">
        <div class="item">
          <a class="ui blue basic button" href="{{ resolve_url('/login') }}"> <i class="sign in icon"></i>Login </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Page Contents -->
  <div class="pusher">
    <div class="ui  vertical masthead center aligned segment">

      <div class="ui container" style="height: 55px;">
        <div class="ui large secondary borderless menu">
          <a class="item" id="logo-text">
            <h1>Techphin</h1>
          </a>
          <div class="right menu">
            <div class="item">
                <a class="ui blue basic button" href="{{ resolve_url('/login') }}"> <i class="sign in icon"></i>Login </a>
            </div>
          </div>
        </div>
      </div>

      <div class="ui text container">
        <h1 class="ui header">
         Browse, Learn and Upload
        </h1>
       <h2>Browse through uploaded videos and Learn new stuffs. Upload videos you like and spread the knowledge.</h2>
        <button id="browse-vid" class="huge primary ui button">Browse Videos</button>
      </div>

     <div class="ui stackable two column grid container" >
      <div class="column" id="sign-image">
        <img class="ui image" src="{!! asset('img/site.png') !!}" alt="">
      </div>
      <div class="column" id="sign-up-seg">
        <div class="ui form" id="sign-up-form">
          <form class="form-horizontal" role="form" method="POST" action="{{ resolve_url('/register') }}">
                        {!! csrf_field() !!}
            <div class="two fields">
              <div class="field {{ $errors->has('firstname') ? 'error' : '' }}">
                <input type="text" name="firstname" placeholder="First Name" value="{{ old('firstname') }}">
              </div>
              <div class="field {{ $errors->has('lastname') ? 'error' : '' }}">
                <input type="text" name="lastname" placeholder="Last Name" value="{{ old('lastname') }}">
              </div>
            </div>
            <div class="two fields">
              <div class="field {{ $errors->has('username') ? 'error' : '' }}">
                <input type="text" name="username" placeholder="Username" value="{{ old('username') }}">
              </div>
              <div class="field {{ $errors->has('email') ? 'error' : '' }}">
                <input type="text" name="email" placeholder="Email" value="{{ old('email') }}">
            </div>
            </div>
            <div class="two fields">
              <div class="field {{ $errors->has('password') ? 'error' : '' }}">
                <input type="password" name="password" placeholder="Password" autocomplete="off">
              </div>
              <div class="field {{ $errors->has('password_confirmation') ? 'error' : '' }}">
                <input type="password" name="password_confirmation" placeholder="Confirm Password">
              </div>
            </div>
            <div class="field">
              <button class="fluid huge basic blue ui button"><i class="send outline in icon"></i>Register - It's free !!</button>
            </div>
          </form>
        </div>
        <div id="social" class="ui center aligned basic segment">
            <h4 class="ui horizontal divider header">
              <i class="tag icon"></i>
              Register via Social
            </h4>
            <a class="ui facebook button" href="{{ resolve_url('/auth/facebook') }}">
              <i class="facebook icon"></i>
              Facebook
            </a>
            <a class="ui twitter button" href="{{ resolve_url('/auth/twitter') }}">
              <i class="twitter icon"></i>
              Twitter
            </a>
            <a class="ui black button" href="{{ resolve_url('/auth/github') }}">
              <i class="github icon"></i>
              Github
            </a>
        </div>
      </div>
    </div>

  </div>
  <div class="ui vertical segment secondary" id="popular-vid-container">
    <div class="ui container">
      <div class="ui stackable equal height stackable grid">
        @include('partials/categories')
        <div class="thirteen wide computer column sixteen wide mobile" id="popular-videos">
          <div class="ui segment">
            <h3 class="ui horizontal divider header">
              <i class="bar chart icon"></i>
              Popular Videos
            </h3>
            <div class="ui four stackable cards">
              @each('partials.video-card', $videos, 'video', 'partials.no-videos')
            </div>
            <div class="ui middle aligned stackable grid container">
              <div class="row">
                <div class="center aligned column">
                  <a href="{{ resolve_url('/videos') }}" class="ui button">View more<i class="right arrow icon"></i></a>

                </div>
              </div>
            </div>
          </div>

        </div>

      </div>

    </div>
  </div>

  <div class="ui vertical footer segment">
    <div class="ui container">
      <div class="ui right floated horizontal list">
        <div class="disabled item" href="#">© 2016 Techphin, Inc.</div>
        <a class="item" href="http://andela.com">#TIA</a>
      </div>
      <div class="ui horizontal list">

        <strong class="item">Made with <i class="heartbeat icon red" ></i>
          <span class="incognito-text">By</span>
          <a href="https://github.com/andela-joyebanji" target="_blank">Pyjac</a></strong>
      </div>
    </div>
  </div>
  <script src="{!! resolve_asset('js/register.js') !!}"></script>
</body>
</html>
