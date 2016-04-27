<div class="ui vertical menu left" style="width: 18rem;">
  <a class="item" href="{{ url('user/dashboard') }}">
    <i class="icon dashboard"></i>Dashboard
  </a>
  <a class="item" href="{{ url('user/uploaded') }}">
    Uploaded Videos <i class="icon cloud upload"></i>
  </a>
  <a class="item">
    Favourited Videos <i class="icon heart"></i>
  </a>
  <a class="item">
    Commented Videos <i class="icon comments outline"></i>
  </a>
  <a class="item" href="{{ url('/logout') }}">
    Logout
  </a>
</div>
