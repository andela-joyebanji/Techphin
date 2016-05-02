<div class="ui large top borderless menu" id="navBarContext">
  <div class="ui container">
    <a class="item" id="logo-text" href="{{ resolve_url('/') }}">
        <h1>Techphin</h1>
    </a>
    <div class="right menu">
      <div class="item" id="browse">
        <a class="ui blue button" href="{{ resolve_url('videos') }}">Browse videos</a>
      </div>
      <div class="item" id="upload">
        <a class="ui blue basic button" href="{{ resolve_url('user/upload') }}">Upload</a>
      </div>
      <div class="ui dropdown link item">
         <span id="username">{{  auth()->user()->username }}</span>
          <img class="ui avatar image" src="{{ auth()->user()->image }}">
          <i class="dropdown icon"></i>
          <div class="menu">
            <div class="item">
                <i class="icon sign out"></i>
                <a href="{{ resolve_url('logout') }}">Logout</a>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
