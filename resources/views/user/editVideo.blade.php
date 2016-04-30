@extends('layouts.dashboard')
@section('title', 'Edit Video')
@section('styles')
<style type="text/css">
  #category-field [class^=devicon-].icon {
    padding-right: 0;
    font-family: devicon;
  }
  #category-field [class^=devicon-].icon,.field .icon {
      color: #43a6eb;
  }
</style>

@endsection
@section('content')
<h2 class="ui header dividing">Edit Video</h2>
<form class="ui form" method="POST" id="upload" action="{{ resolve_url('user/edit/video/'.$video->id) }}">
 {!! csrf_field() !!}
  <div class="ui error message">
    @unless (count($errors) === 0)
    <script>
      $(document).ready(function() {
        $('.ui.error.message').show();
      });
    </script>
      <ui class="list">
        @foreach ($errors->all() as $message)
          <li>{{ $message }}</li>
        @endforeach
      </ui>
    @endunless
  </div>
  @if(Session::has('success'))
    <div class="ui success message visible">
        <div class="header">Success</div>
        <p>{!! Session::get('success') !!}</p>
    </div>
  @endif
  <div class="field {{ $errors->has('title') ? 'error' : '' }}">
    <div class="ui labeled input large">
      <div class="ui label">
        <i class="icon write"></i>
      </div>
      <input type="text" name="title" placeholder="Title" value="{{ $video->title }}">
    </div>
  </div>
  <div class="field {{ $errors->has('link') ? 'error' : '' }}">
    <div class="ui labeled input large">
      <div class="ui label">
        <i class="icon youtube play" style="color: #43a6eb"></i>
      </div>
      <input type="text" name="link" placeholder="Youtube Url: e.g. https://www.youtube.com/watch?v=w14zUTXOhYE" value="{{ $video->link }}">
    </div>
  </div>
  <div class="field {{ $errors->has('description') ? 'error' : '' }}">
    <textarea name="description" placeholder="Description of the video">{{ $video->description }}</textarea>
  </div>
  <div class="field {{ $errors->has('category_id') ? 'error' : '' }}" id="category-field">
    <div class="ui fluid selection dropdown">
      <input type="hidden" name="category_id" value="{{ $video->category_id }}">
      <i class="dropdown icon"></i>
      <div class="default text">Category</div>
      <div class="menu">
        @foreach ($categories as $category)
           <div class="item" data-value="{{ $category->id }}">
              <i class="{{ $category->icon }} icon"></i>
              {{ $category->name }}
            </div>
        @endforeach
      </div>
    </div>
  </div>
  <div class="field" id="tag">
    <div class="ui fluid multiple search selection dropdown">
      <input name="tags" type="hidden" value="{{ implode(',', $video->tags->pluck('name')->all()) }}">
      <i class="dropdown icon"></i>
      <div class="default text">Tags</div>
      <div class="menu">
        @foreach ($tags as $tag)
           <div class="item" data-value="{{ $tag->name }}">
              {{ $tag->name }}
            </div>
        @endforeach
      </div>
    </div>
  </div>
  <button class="ui button primary large" type="submit">Edit Video</button>
</form>
@endsection

@section('scripts')
  <script src="{{ resolve_asset('js/upload.js') }}"></script>
@endsection