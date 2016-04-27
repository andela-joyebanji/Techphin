<div class="ui large top borderless menu">
  <div class="ui container">
    <a class="item" href="{{ url('/') }}">Techphin</a>
    <div class="right menu">
      <div class="item">
        <a class="ui blue button" href="{{ url('videos') }}">Browse videos</a>
      </div>
      <div class="item">
        <a class="ui blue basic button" href="{{ url('user/upload') }}">Upload</a>
      </div>
      <div class="ui dropdown link item">
          {{  auth()->user()->username }}
          <img class="ui avatar image" src="{{ auth()->user()->image }}">
          <i class="dropdown icon"></i>
          <div class="menu">
            <div class="item">
                <i class="icon sign out"></i>
                <a href="{{ url('logout') }}">Logout</a>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
