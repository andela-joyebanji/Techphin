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