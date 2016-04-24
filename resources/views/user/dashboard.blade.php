<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properties -->
  <title>Dashboard - Techphin </title>
  <link href='https://fonts.googleapis.com/css?family=Lora:700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="{{  url('semantic/semantic.min.css') }}">
  <link rel="stylesheet" href="https://cdn.rawgit.com/konpa/devicon/master/devicon.min.css">
  <link rel="stylesheet" type="text/css" href="{!! resolve_asset('css/main.css') !!}">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.min.js"></script>
  <script src="{{ url('semantic/semantic.min.js') }}"></script>
  <script src="{!! resolve_asset('js/home.js') !!}"></script>
</head>
<body>
<div class="ui large top borderless menu">
  <div class="ui container">
    <a class="item">Techphin</a>

    <div class="right menu">
      <div class="item">
        <a class="ui blue basic button">Upload</a>
      </div>
    </div>
  </div>
</div>
<div class="ui bottom basic segment container pushable">
  <div class="ui grid">
    <div class="four wide column" style="min-height: 600px;">
      <div class="ui vertical menu left" style="width: 18rem;">
        <div class="item">
            <a class="ui aligned logo icon small circular image" href="/">
              <img src="http://placehold.it/200x200">
            </a>
        </div>
        <a class="item">
          <i class="icon dashboard"></i>Dashboard
        </a>
        <a class="item">
          Uploaded Videos <i class="icon cloud upload"></i>
        </a>
        <a class="item">
          Favourited Videos <i class="icon heart"></i>
        </a>
        <a class="item">
          Commented Videos <i class="icon comments outline"></i>
        </a>
      </div>
    </div>
    <div class="twelve wide column">
      <div class="pusher">
        <div class="ui container">
          <h2 class="ui header dividing">Dashboard</h2>
          <div class="ui statistics">
            <div class="statistic">
              <div class="value">
                <i class="icon video play"></i> 0
              </div>
              <div class="label">
                Videos
              </div>
            </div>
            <div class="statistic">
              <div class="value">
                <i class="icon unhide"></i> 0
              </div>
              <div class="label">
                Views
              </div>
            </div>
            <div class="statistic">
              <div class="value">
                <i class="icon comments"></i> 0
              </div>
              <div class="label">
                Comments
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
</div>


  <script src="{!! resolve_asset('js/register.js') !!}"></script>
</body>
</html>