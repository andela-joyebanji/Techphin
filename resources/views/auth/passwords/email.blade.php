@extends('layouts.auth')
@section('title', 'Reset Password')
@section('styles')
  <style>
    #main-container {
      margin-top: 10em;
    }

    .footer .container {
      margin-top: 12em;
    }
  </style>
@stop
@section('content')

<div class="ui column segment">
  <a class="item ui header" id="logo-text" href="{{ resolve_url('/') }}">
        <h1>Techphin</h1>
  </a>
  <h2 class="ui header">

    <div class="content">
      Password Reset
    </div>
  </h2>
  <p style="font-size: 16px;">Just enter the email address you used to Sign Up and we'll help you get your password back.</p>
  <div class="ui basic segment">
    <form class="ui large form" method="POST" action="{{ url('/password/email') }}">
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
      @if (session('status'))
          <div class="ui visible success message">
            <i class="close icon"></i>
            <div class="header">
              Success
            </div>
            <p>{{ session('status') }}</p>
          </div>
      @endif

        <div class="field {{ $errors->has('email') ? 'error' : '' }}">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="E-mail address">
          </div>
        </div>
        <button type="submit" class="ui fluid large primary submit button">
            <i class="icon envelope"></i>Send Password Reset Link
        </button>
    </form>
    <div class="ui message">
        <a href="{{ resolve_url('/login') }}">Return to Log In</a>
    </div>
  </div>
@stop