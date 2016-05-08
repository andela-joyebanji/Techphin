@extends('layouts.page')
@section('pageContent')
  <div class="ui container">
    <div class="ui stackable equal height stackable grid">
      @include('partials.categories')
      @yield('content')
    </div>
  </div>

@endsection
