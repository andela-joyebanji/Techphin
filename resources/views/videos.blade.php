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
        All Videos
      </h3>

      <div class="ui four stackable cards">
        @forelse ($videos as $video)
            <div class="card">
              <a href="{{ resolve_url('videos/'.$video->id) }}" class="image">
                <div class="ui dimmer">
                  <div class="content">
                    <div class="center">
                      <div class="ui inverted button">
                      <i class="icon play"></i>Play</div>
                    </div>
                  </div>
                </div>
                <img src="http://img.youtube.com/vi/{{ substr($video->link, 32) }}/mqdefault.jpg">
              </a>
              <div class="content">
                <div class="header">
                  <a href="{{ resolve_url('videos/'.$video->id) }}">
                    {{ str_limit($video->title, 70) }}
                  </a>
                </div>
                <div class="meta">
                 by: <a href="{{ resolve_url('videos/user/'.$video->owner->username) }}">{{ str_limit(ucwords($video->owner->username), 20) }}</a>
                </div>
                <span>
                  <i class="icon unhide"></i>{{ $video->views }} Views
                </span>
              </div>
            </div>
        @empty
            <p> :( No videos uploaded yet.</p>
        @endforelse
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
