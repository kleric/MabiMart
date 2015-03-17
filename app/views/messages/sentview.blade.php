@extends('layouts.messages')
@section('page-title')
Sent
@stop
@section('msgs')
<div class="col-md-8">
  <div class="panel panel-info">
    <div class="panel-heading">
      Sent
    </div>
    @if(count($sent) > 0)
    <table class="table table-hover">
      <tbody>
        @foreach($sent as $msg)
        <tr class="clickableRow" href="{{ URL::route('view-message', $msg->id) }}">
          <td><h5>{{{ $msg->getRecieverName() }}}</h5></td>
          <td><h6>{{{ $msg->getSubject() }}}</h6></td>
          <td><h6>{{{ $msg->getDate() }}}</h6></td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <div class="panel-body">
      <center>You haven't sent any messages</center>
    </div>
    @endif
  </div>
</div>
@stop