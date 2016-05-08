<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properties -->
  <title>@yield('title') - Techphin </title>
  <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="{!! resolve_asset('semantic/semantic.min.css') !!}">
  <link rel="stylesheet" href="https://cdn.rawgit.com/konpa/devicon/master/devicon.min.css">
  <link rel="stylesheet" type="text/css" href="{!! resolve_asset('css/main.css') !!}">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.min.js"></script>
  <script src="{!! resolve_asset('semantic/semantic.min.js') !!}"></script>
  <style type="text/css">
    body {
      background: #F8F8F9;
    }
    body > .grid {
      height: 95%;
    }
    .image {
      margin-top: -100px;
    }
    .column {
      max-width: 450px;
    }
    #main-container {
      margin-top: 5em;
    }

    .footer .container {
      margin-top: 4em;
    }
  </style>
  @yield('styles')
</head>
<body>
    <div class="ui container" id="main-container">
      <div class="ui middle aligned center aligned grid">
          @yield('content')
      </div>
    </div>

  <div class="ui vertical footer segment">
    <div class="ui container">
      <div class="ui right floated horizontal list">
        <div class="disabled item" href="#">© 2016 Techphin, Inc.</div>
        <a class="item" href="http://andela.com">#TIA</a>
      </div>
      <div class="ui horizontal list">

        <strong class="item">Made with <i class="heart icon red" ></i>
          <span class="incognito-text">By</span>
          <a href="https://github.com/andela-joyebanji" target="_blank">Pyjac</a></strong>
      </div>
    </div>
  </div>
</body>
<script src="{{ resolve_asset('js/close.js') }}"></script>
@yield('scripts')
</html>