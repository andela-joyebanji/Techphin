<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properties -->
  <title>@yield('title') &#187; Techphin </title>
  <link href='https://fonts.googleapis.com/css?family=Lora:700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="{{ resolve_asset('semantic/semantic.min.css') }}">
  <link rel="stylesheet" href="https://cdn.rawgit.com/konpa/devicon/master/devicon.min.css">
  <link rel="stylesheet" type="text/css" href="{!! resolve_asset('css/main.css') !!}">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.min.js"></script>
  <script src="{{ resolve_asset('semantic/semantic.min.js') }}"></script>
  <script>
  $(document)
      .ready(function() {

              $('.ui.dropdown').dropdown();
            });
  </script>
  <style>
    @media only screen and (max-width: 700px) {
      #navBarContext #browse, #navBarContext #upload {
        display: none !important;
      }

      #navBarContext .dropdown.link.item #username {
        display: none !important;
      }*/
    }
  </style>
  @yield('styles')
</head>
<body>

@include('partials.topnav')
<div class="ui bottom basic segment container pushable">
  <div class="ui grid stackable" style="min-height: 50px;">

    <div class="four wide column">
      @include('partials.sidenav')
    </div>
    <div class="twelve wide column">
      <div class="pusher">
        <div class="ui container">
          @yield('content')
        </div>
      </div>
    </div>
  </div>
  @include('partials.footer')
</div>
  @yield('scripts')
</body>
</html>
