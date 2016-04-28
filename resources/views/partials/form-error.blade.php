<div class="ui error message">
  @unless (count($errors) === 0)
  <script>
    $(document).ready(function() {
      $('.ui.error.message').show();
    });
  </script>
    <i class="close icon"></i>
    <ui class="list">
      @foreach ($errors->all() as $message)
        <li>{{ $message }}</li>
      @endforeach
    </ui>
  @endunless
</div>