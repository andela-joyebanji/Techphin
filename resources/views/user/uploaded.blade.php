@extends('layouts.dashboard')
@section('title', 'Uploaded Videos')

@include(
          'partials.delete-dash-videos-list',
          [
            'videos' => $videos,
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
    <div class="ui green cancel inverted button">
      <i class="remove icon"></i>
      No
    </div>
    <div class="ui red ok inverted button">
      <i class="checkmark icon"></i>
      Yes
    </div>
  </div>
</div>
@section('scripts')
<script>
  $.fn.api.settings.api.deleteVideo = "{{ resolve_url('/api/videos/{videoid}/delete') }}";

  $(".deleteVideo").click(function() {
    var $toDelete = $(this);
    $('#deleteModal').modal({
          closable  : false,
          onDeny    : function() {
            return true;
          },
          onApprove : function() {
            //console.log($toDelete.find(".deleteVideoApi"));
            $toDelete.parent().find(".deleteVideoApi").click();
            return true;
          }
        })
        .modal('show');
  });
  $(".deleteVideoApi").api({
      action       : 'deleteVideo',
      onResponse : function(deleteStateResponse) {
        if(deleteStateResponse.state == "deleted") {
          location.reload();
        }
      }
    });
</script>
@stop
