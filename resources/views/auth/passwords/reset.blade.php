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
      Reset Password
    </div>
  </h2>
  <div class="ui basic segment">
    <form class="ui large form" method="POST" action="{{ url('/password/reset') }}">
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
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="field {{ $errors->has('email') ? 'error' : '' }}">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="email" name="email" value="{{ $email or old('email') }}" placeholder="E-mail address">
          </div>
        </div>

        <div class="field {{ $errors->has('password') ? 'error' : '' }}">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="password" placeholder="Password">
          </div>
        </div>

        <div class="field {{ $errors->has('password_confirmation') ? 'error' : '' }}">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="password_confirmation" placeholder="Confirm Password">
          </div>
        </div>

        <button type="submit" class="ui fluid large primary submit button">
            <i class="icon refresh"></i>Reset Password
        </button>
    </form>
  </div>
@stop