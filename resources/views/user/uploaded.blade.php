@extends('layouts.dashboard')
@section('title', 'Uploaded Videos')
@section('styles')
<style type="text/css">
  #category-field [class^=devicon-].icon {
    padding-right: 0;
    font-family: devicon;
  }
  #category-field [class^=devicon-].icon,.field .icon {
      color: #43a6eb;
  }
  .four.stackable.cards .card {
    box-shadow: none;
  }

  .four.stackable.cards > .card > .content {
    padding: 1em 0em 0em;
    border-top: none !important;
  }

</style>
<script>
$(document)
    .ready(function() {
      $('.four.stackable.cards .image').dimmer({
          on: 'hover'
      });
    });
</script>


@endsection
@section('content')
  <h2 class="ui header dividing">Uploaded Video</h2>
  <div class="ui four stackable cards">
    @forelse (Auth::user()->videos as $video)
        <div class="card">
          <a href="{{ url('videos/'.$video->id) }}" class="image">
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
              <a href="{{ url('videos/'.$video->id) }}">
                {{ str_limit($video->title, 70) }}
              </a>
            </div>
            <div class="meta">
             by: <a href="{{ url('videos/user/'.$video->owner->username) }}">{{ str_limit(ucwords($video->owner->username), 20) }}</a>
            </div>
            <span>
              151 Views
            </span>
          </div>
        </div>
    @empty
        <div class="ui message column"> :( No videos uploaded yet.</div>
    @endforelse
  </div>


@endsection

@section('scripts')
  <script src="{{ resolve_asset('js/upload.js') }}"></script>
@endsection
