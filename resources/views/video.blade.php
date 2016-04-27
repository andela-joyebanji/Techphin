@extends('layouts.page') @section('styles')
<script type="text/javascript">
  $(document).ready(function() {
    $('.ui.embed').embed({
      parameters: {
        autoplay: true
      }
    });
  });
</script>
<style media="screen">
  .ui.comments {
    width: 100%;
  }

  #video {
    background-color: #07263E;
  }

  .ui.tiny {
    width: 40px;
  }
</style>
@stop @section('pageContent')
<div class="ui grid stackable centered" id="video">
  <div class="thirteen wide column">
    <div class="ui embed" data-source="youtube" data-id="{{ substr($video->link, 32) }}" data-icon="video"></div>
  </div>
</div>

<div class="ui grid stackable centered">
  <div class="thirteen wide column">
    <div class="ui grid">
      <div class="ten wide column">
        <div class="ui segment" style="margin-top: 1.5rem;">
          <h2 class="ui dividing header">{{ $video->title }}</h2>
          <div class="ui grid">
            <div class="two column row">
              <div class="left floated column">
                <img class="ui middle aligned tiny image" src="{{ $video->owner->image }}">
                <span> {{ $video->owner->username }} </span>
              </div>
              <div class="right floated column" style="margin-top: 2em;">
                  <div class="ui left labeled button" tabindex="0">
                    <a class="ui basic right pointing label {{ $video->views }} views">
                      {{ $video->views }}
                    </a>
                    <div class="ui button">
                      <i class="icon unhide"></i> Views
                    </div>
                  </div>
                  <div class="ui left labeled button" tabindex="0">
                    <a class="ui basic right pointing label">
                      0
                    </a>
                    <div class="ui button">
                      <i class="heart icon"></i>
                    </div>
                  </div>
              </div>
            </div>
          </div>

            <h4 class="ui dividing header">Description</h4>
            <p>
              {{ $video->description }}
            </p>
        </div>

        <div class="ui grid container">
          <div class="row">
            <div class="column">
              <div class="ui tag labels">
                @foreach ($video->tags as $tag)
                    <a href="{{ resolve_url('videos/tags/'.$tag->id)}}" class="ui label">
                    {{ $tag->name }}
                    </a>
                @endforeach
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="sixteen wide column">
          </div>
        </div>
      </div>
      <div class="six wide column">
        <div class="ui segment" style="margin-top: 1.5rem;">
          <h4 class="ui horizontal divider header">
            Related Videos
          </h4>
          <div class="ui items">
            @forelse ($relatedVideos as $video)
              <div class="item">
                <div class="ui small image">
                  <img src="http://img.youtube.com/vi/{{ substr($video->link, 32) }}/mqdefault.jpg">
                </div>
                <div class="content">
                  <a class="header" href="{{ resolve_url('videos/'.$video->id) }}">
                    {{ str_limit($video->title, 30) }}
                  </a>
                  <div class="description">
                    by: <a href="{{ resolve_url('videos/user/'.$video->owner->id) }}">
                      {{ str_limit($video->owner->username, 30) }}
                    </a>
                  </div>
                  <div class="meta">
                    <span>views</span>
                  </div>

                  <div class="extra">
                    {{-- Additional Details --}}
                  </div>
                </div>
              </div>
            @empty
                <p> :( No related Video.</p>
            @endforelse
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
{{--
<div class="ui column centered stackable grid">
  <div class="column">
    <div class="ui embed" data-source="youtube" data-id="{{ substr($video->link, 32) }}" data-icon="video"></div>
  </div>
  <div class="four column centered row">
    <div class="column"></div>
    <div class="column"></div>
  </div>
</div> --}} @endsection
