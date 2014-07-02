@extends('layouts.messages')
@section('page-title')
Inbox
@stop
@section('msgs')
<div class="col-md-8">
  <div class="panel panel-info">
    <div class="panel-heading">
      Inbox
    </div>
    @if(count($inbox) > 0)
    <table class="table table-hover">
      <tbody>
        @foreach($inbox as $msg)
        <tr class="clickableRow" href="http://google.com/">
          <td><h5>$msg->getSenderName()</h5></td>
          <td><h6>$msg->getSubject()</h6></td>
          <td><h6>$msg->getDate()</h6></td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <div class="panel-body">
      <center>You have no messages in your inbox.</center>
    </div>
    @endif
  </div>
</div>
@stop