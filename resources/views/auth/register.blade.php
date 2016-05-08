@extends('layouts.auth')
@section('title', 'Register')
@section('styles')
<style>
  .column {
    max-width: 600px;
  }
</style>
@stop
@section('content')
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
      <a class="ui black button" href="{{ resolve_url('/auth/github') }}">
        <i class="github icon"></i>
        Github
      </a>
  </div>
</div>
@stop



@section('scripts')
   <script src="{!! resolve_asset('js/register.js') !!}"></script>
@stop


