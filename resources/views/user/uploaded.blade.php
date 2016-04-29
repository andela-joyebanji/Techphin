@extends('layouts.dashboard')
@section('title', 'Uploaded Videos')

@include(
          'partials.delete-dash-videos-list',
          [
            'videos' => Auth::user()->videos,
            'title'  => 'Uploaded Videos'
          ]
        )


<div class="ui small basic modal" id="deleteModal">
  <div class="ui icon header">
    <i class="archive icon"></i>
   Delete Video
  </div>
  <div class="content">
    <p style="text-align: center;">Are you sure you want to delete this video?</p>
  </div>
  <div class="actions">
    <div class="ui red basic cancel inverted button">
      <i class="remove icon"></i>
      No
    </div>
    <div class="ui green ok inverted button">
      <i class="checkmark icon"></i>
      Yes
    </div>
  </div>
</div>
@section('scripts')
<script>
  $.fn.api.settings.api.deleteVideo = "{{ resolve_url('/api/videos/{videoid}/delete') }}";

  $("#deleteVideo").click(function(){
    $('#deleteModal').modal({
          closable  : false,
          onDeny    : function(){
            return true;
          },
          onApprove : function() {
            $("#deleteVideoApi").click();
            return true;
          }
        })
        .modal('show');
  });
  $("#deleteVideoApi").api({
      action       : 'deleteVideo',
      onResponse : function(deleteStateResponse) {
        if(deleteStateResponse.state == "deleted"){
          location.reload();
        }
      }
    });
</script>
@stop
