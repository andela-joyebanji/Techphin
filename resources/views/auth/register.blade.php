<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properties -->
  <title>Login - Techphin </title>
  <link href='https://fonts.googleapis.com/css?family=Lora:700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="semantic/semantic.min.css">
  <link rel="stylesheet" href="https://cdn.rawgit.com/konpa/devicon/master/devicon.min.css">
  <link rel="stylesheet" type="text/css" href="{!! resolve_asset('css/main.css') !!}">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.min.js"></script>
  <script src="semantic/semantic.min.js"></script>
</head>
<body>
 <style type="text/css">

  body {
    background-color: #F8F8F9;
  }
  body > .grid {
    height: 95%;

  }
  .image {
    margin-top: -100px;
  }
  .column {
    max-width: 600px;
  }
</style>

<div class="ui middle aligned center aligned grid">
  <div class="ui column segment">
    <a class="item ui header" id="logo-text" href="{{ url('/') }}">
      <h1>Techphin</h1>
    </a>
    <h3 class="ui header">
      <div class="content">
        Register to create an account.
      </div>
    </h3>
    <div class="ui basic segment">
      <form class="ui large form" id="register" method="POST" action="{{ url('/register') }}">
        <div class="ui error message">

          @unless (count($errors) === 0)
          <script>
            $(document).ready(function() {
              $('.ui.error.message').show();
            });
          </script>
          <ui class="list">
            @foreach ($errors->all() as $message)
            <li>{{ $message }}</li>
            @endforeach
          </ui>
          @endunless
        </div>
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

          <button class="fluid big blue ui button"><i class="sign in icon"></i>Register</button>
        </div>
      </form>
    </div>
    <div id="social" class="ui center aligned basic segment">
        <h4 class="ui horizontal divider header">
          <i class="tag icon"></i>
          Register via Social
        </h4>
        <a class="ui facebook button" href="{{ url('/auth/facebook') }}">
          <i class="facebook icon"></i>
          Facebook
        </a>
        <a class="ui twitter button" href="{{ url('/auth/twitter') }}">
          <i class="twitter icon"></i>
          Twitter
        </a>
        <a class="ui google plus button" href="{{ url('/auth/google') }}">
          <i class="google plus icon"></i>
          Google Plus
        </a>
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