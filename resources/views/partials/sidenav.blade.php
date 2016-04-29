<div class="ui vertical menu left" style="width: 18rem;">
  <a class="item" href="{{ resolve_url('user/dashboard') }}">
    <i class="icon dashboard"></i>Dashboard
  </a>
  <a class="item" href="{{ resolve_url('user/profile') }}">
    Profile <i class="icon user upload"></i>
  </a>
  <a class="item" href="{{ resolve_url('user/uploaded') }}">
    Uploaded Videos <i class="icon cloud upload"></i>
  </a>
  <a class="item" href="{{ resolve_url('user/favourited') }}">
    Favourited Videos <i class="icon heart"></i>
  </a>
  <!--
  <a class="item">
    Commented Videos <i class="icon comments outline"></i>
  </a>
  -->
  <a class="item" href="{{ resolve_url('/logout') }}">
    Logout
  </a>
</div>
