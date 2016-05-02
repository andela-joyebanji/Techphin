@extends('layouts.auth')
@section('title', 'Login')
@section('content')

<div class="ui column segment">
  <a class="item ui header" id="logo-text" href="{{ resolve_url('/') }}">
        <h1>Techphin</h1>
  </a>
  <h3 class="ui header">

    <div class="content">
      Welcome, Please Login.
    </div>
  </h3>
  <div class="ui basic segment">
    <form class="ui large form" method="POST" action="{{ resolve_url('/login') }}">
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

        <div class="field {{ $errors->has('email') ? 'error' : '' }}">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="email" value="{{ old('email') }}" placeholder="E-mail address">
          </div>
        </div>
        <div class="field {{ $errors->has('password') ? 'error' : '' }}">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="password" placeholder="Password">
          </div>
        </div>
        <button class="ui fluid large primary submit button">Login</button>
    </form>
  </div>
  <div id="social" class="ui center aligned basic segment">
    <h4 class="ui horizontal divider header">
      <i class="tag icon"></i>
      Login via Social
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

<div class="ui message">
  New ? <a href="{{ resolve_url('/register') }}">Register</a>
</div>
@stop



@section('scripts')
  <script>
  $(document)
    .ready(function() {
      $('.ui.form')
        .form({
          fields: {
            email: {
              identifier  : 'email',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter your e-mail'
                },
                {
                  type   : 'email',
                  prompt : 'Please a valid e-mail address'
                }
              ]
            },
            password: {
              identifier  : 'password',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter your password'
                },
                {
                  type   : 'length[6]',
                  prompt : 'Your password must be at least 6 characters'
                }
              ]
            }
          }
        })
      ;
    })
  ;
  </script>
@stop

