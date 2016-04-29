@section('styles')
<style type="text/css">
  #category-field [class^=devicon-].icon {
    padding-right: 0;
    font-family: devicon;
  }
  #category-field [class^=devicon-].icon,.field .icon {
      color: #43a6eb;
  }
  .four.stackable.cards .card {
    box-shadow: none;
  }

  .four.stackable.cards > .card > .content {
    padding: 1em 0em 0em;
    border-top: none !important;
  }

</style>
<script>
$(document)
    .ready(function() {
      $('.four.stackable.cards .image').dimmer({
          on: 'hover'
      });
    });
</script>


@endsection
@section('content')
  <h2 class="ui header dividing">{{ $title }}</h2>
  <div class="ui four stackable cards">
    @each('partials.delete-video-card', $videos, 'video', 'partials.no-videos')
  </div>
@endsection