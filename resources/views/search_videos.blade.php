@extends('layouts.videos')
@section('title', 'Videos')
@section('styles')
  <style>
    #popular-videos .ui.segment {
      padding-top: 1em;
    }
  </style>
@stop
@section('content')

  <div class="thirteen wide computer column sixteen wide mobile" id="popular-videos">
    <div class="ui segment">
      <h3 class="ui left aligned header">
        Search Results : {{ $queryString }}
      </h3>
      <div class="ui four stackable cards">
       @each('partials.video-card', $videos, 'video', 'partials.no-search')
        <div class="ui middle aligned stackable grid container">
          <div class="row">
            <div class="center aligned column">
              {!! $videos->links() !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
