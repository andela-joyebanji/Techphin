@extends('layouts.videos')
@section('title', ucwords($tag->name).' videos')
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
        Videos in Tag : {{ $tag->name }}
      </h3>

      <div class="ui four stackable cards">
        @each('partials.video-card', $videos, 'video', 'partials.no-videos')
        <div class="ui middle aligned stackable grid container">
          <div class="row">
            <div class="center aligned column">
              <a class="ui button">Load More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection