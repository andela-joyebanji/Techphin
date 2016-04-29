@extends('layouts.dashboard')
@section('title', 'Profile')
@section('styles')
<style type="text/css">
  #category-field [class^=devicon-].icon {
    padding-right: 0;
    font-family: devicon;
  }
  #category-field [class^=devicon-].icon,.field .icon {
      color: #43a6eb;
  }
</style>
<script>
   $(document).ready(function() {
    $("#changeAvatar").on("click", function() {

       event.preventDefault();
       $('#avatar').click();
    });

     $('#avatar').on("change", function (event)
      {

        var tmppath = URL.createObjectURL(event.target.files[0]);
        $("#currentAvatar").attr("src", URL.createObjectURL(event.target.files[0]));

      });
  });
</script>

@endsection
@section('content')
<h2 class="ui header dividing">Your Profile</h2>
<form class="ui form" method="POST" enctype='multipart/form-data' action="{{  resolve_url('/user/profile') }}" >
  <div class="ui error message">
    @unless (count($errors) === 0)
    <script>
      $(document).ready(function() {
        $('.ui.error.message').show();
      });
    </script>
      <i class="close icon"></i>
      <ui class="list">
        @foreach ($errors->all() as $message)
          <li>{{ $message }}</li>
        @endforeach
      </ui>
    @endunless
  </div>
  @if(Session::has('success'))
    <div class="ui success message visible">
        <div class="header">Success</div>
        <p>{!! Session::get('success') !!}</p>
    </div>
  @endif
  {!! csrf_field() !!}
  <div class="field">
    <label>Username</label>
    <input type="text" name="username" placeholder="Username" value="{{ auth()->user()->username }}">
  </div>
  <div class="field">
    <label>Firstname</label>
    <input type="text" name="firstname" placeholder="First Name" value="{{ auth()->user()->firstname }}">
  </div>
  <div class="field">
    <label>Lastname</label>
    <input type="text" name="lastname" placeholder="Last Name" value="{{ auth()->user()->lastname }}">
  </div>
  <div class="field">
    <label>Email</label>
    <input type="text" name="email" placeholder="Email" value="{{ auth()->user()->email }}">
  </div>
  <div class="field">
      <label><button class="ui button basic primary" id="changeAvatar"><i class="icon edit"></i>Change Avatar</button></label>
      <input type="file" style="display: none;" id="avatar" name="image"></input>
      <img class="ui medium image" id="currentAvatar" src="{{ auth()->user()->image }}">
      <input style="display: none;" id="UpAvatar"></input>

  </div>
  <button class="ui button primary" type="submit">Update Profile</button>
</form>
@endsection

@section('scripts')
  <script src="{{ resolve_asset('js/upload.js') }}"></script>
@endsection