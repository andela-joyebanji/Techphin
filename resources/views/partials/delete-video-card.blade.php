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
      <i class="icon unhide"></i> {{ $video->views }} views
    </span>
  </div>
  <div class="ui bottom red attached button deleteVideoApi" style="display: none" data-videoId="{{ $video->id }}">
    </div>
  <div class="ui bottom red attached button deleteVideo">
      <i class="trash icon"></i>
      Delete
    </div>
</div>
