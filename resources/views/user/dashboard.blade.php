@extends('layouts.dashboard')
@section('title', 'Dashboard')
@section('content')
<h2 class="ui header dividing">Dashboard</h2>
<div class="ui statistics">
  <div class="statistic">
    <div class="value">
      <i class="icon video play"></i> {{ auth()->user()->videos()->count() }}
    </div>
    <div class="label">
      Videos
    </div>
  </div>
  <div class="statistic">
    <div class="value">
      <i class="icon unhide"></i> {!! auth()->user()->videosViewCount() !!}
    </div>
    <div class="label">
      Views
    </div>
  </div>
  <div class="statistic">
    <div class="value">
      <i class="icon comments"></i> {{ auth()->user()->videosCommentCount()->count() }}
    </div>
    <div class="label">
      Comments
    </div>
  </div>
</div>
@endsection