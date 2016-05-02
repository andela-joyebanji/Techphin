@extends('layouts.page')
@section('title', $video->title)
@section('styles')
<script type="text/javascript">
  $(document).ready(function() {

    $.fn.api.settings.api.favourite = "{{ resolve_url('/api/favourite/{videoId}') }}";
    $('.ui.embed').embed({
      parameters: {
        autoplay: true
      }
    });
    $('#like .button').api({
      action       : 'favourite',
      urlData: {
        videoId: {{ $video->id }}
      },
      onResponse : function(favouriteStateResponse) {
        $('#like .label').text(('flash text', parseInt($('#like .label').text()) + parseInt(favouriteStateResponse.state)));
        $('#like .button').find(".icon").toggleClass("red");
      }
    });

    $('#commentForm')
      .form({
        fields: {
          body: {
            identifier  : 'body',
            rules: [
            {
              type   : 'empty',
              prompt : 'Please enter your comment'
            }
            ]
          },
        },
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
    <div class="ui stackable grid">
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
                  <div class="ui labeled button" tabindex="0">
                    <div class="ui button pointing">
                      <i class="icon unhide"></i>
                    </div>
                    <a class="ui basic left pointing label {{ $video->views }} views">
                      {{ $video->views }} views
                    </a>
                  </div>
                  <div class="ui labeled button" id="like" tabindex="0">
                    <div class="ui button pointing @unless (auth()->user()) {{ "disabled" }} @endunless">
                      <i class="heart icon @if (auth()->user() && auth()->user()->isFavourited($video->id)) {{ "red" }} @endif"></i>
                    </div>
                    <a class="ui basic left pointing label {{ $video->favourites() }} favourites">
                      {{ $video->favourites() }}
                    </a>
                  </div>

                  <!-- <div class="ui left labeled button" id="like" tabindex="0">
                    <a class="ui basic right pointing label {{ $video->favourites() }} favourites">
                      {{ $video->favourites() }}
                    </a>
                    <div class="ui button @unless (auth()->user()) {{ "disabled" }} @endunless">
                      <i class="heart icon @if (auth()->user() && auth()->user()->isFavourited($video->id)) {{ "red" }} @endif"></i>
                    </div>
                  </div> -->
              </div>

            </div>
          </div>
          <div class="ui grid">
             <div class="column">Category: <a href="{{ resolve_url('videos/category/'.$video->category->name) }}">{{ $video->category->name }}</a></div>
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
                    <a href="{{ resolve_url('videos/tag/'.$tag->name)}}" class="ui label">
                    {{ $tag->name }}
                    </a>
                @endforeach
              </div>
            </div>
          </div>
        </div>
        <div class="ui segment">
          <div class="ui comments">
            @if(count($comments) > 0)
              <h3 class="ui dividing header">Comments</h3>
            @else
              @if(auth()->user())
                <h3 class="ui dividing header">Add a Comment</h3>
              @else
                <h3 class="ui header">No Comments on this video yet.</h3>
              @endif
            @endif

            @foreach ($comments as $comment)
              <div class="comment">
                <a class="avatar">
                  <img src="{{ $comment->author->image }}">
                </a>
                <div class="content">
                  <a class="author">{{ $comment->author->firstname }} {{ $comment->author->lastname }}</a>
                  <div class="metadata">
                    <span class="date">
                    {{ (new \Carbon\Carbon($comment->created_at))->diffForHumans() }}
                    </span>
                  </div>
                  <div class="text">
                    {{ $comment->body }}
                  </div>
                </div>
              </div>
            @endforeach
            @if(auth()->user())
              <form class="ui reply form" id="commentForm" method="POST" action="{{ resolve_url('/videos/'.$video->id.'/comment')}}">
                @include('partials/form-error')
                 {!! csrf_field() !!}
                <div class="field">
                  <textarea name="body"></textarea>
                </div>
                <button class="ui blue labeled submit icon button">
                  <i class="icon edit"></i> Add Comment
                </button>
              </form>
            @endif
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
                    <span>
                      <i class="icon unhide"></i> {{ $video->views }} views
                    </span>
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
@endsection
