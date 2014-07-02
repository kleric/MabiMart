@extends('layouts.master')
@section('script')
<script>
jQuery(document).ready(function($) {
      $(".clickableRow").click(function() {
            window.document.location = $(this).attr("href");
      });
});
</script>
@stop
@section('content')
<br/>
<div class="col-md-4">
  <div class="list-group">
    @if($state == 1)
    <a href="{{ URL::route('inbox') }}" class="list-group-item active">
    @else
    <a href="{{ URL::route('inbox') }}" class="list-group-item">
    @endif
      Inbox @if(($unreadcount = Auth::user()->getUnreadInboxCount())) <span class="badge">{{{ $unreadcount }}}</span> @endif
    </a>
    @if($state == 2)
    <a href="{{ URL::route('sent') }}" class="list-group-item active">
    @else
    <a href="{{ URL::route('sent') }}" class="list-group-item">
    @endif
      Sent
    </a>
  </div>
</div>
@yield ('msgs')
@stop
