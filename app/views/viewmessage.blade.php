@extends('layouts.messages')
@section('page-title')
View Message
@stop
@section('msgs')

<div class="col-md-8">
  <div class="panel panel-info">
    <div class="panel-heading">
      @if(!isset($sent_view))
      Message from {{{ $sender_name }}}
      @else
      Your message to {{{ $reciever_name }}}
      @endif
    </div>
    <div class="panel-body">
      <h5>Subject: {{{ $subject }}}</h5>
      {{{ $content }}}
      <br/>
      @if(!isset($sent_view))
      <br/>
      <a href="{{ URL::route('reply-message', $message_id) }}" class="btn btn-success pull-right">Reply</a>
      @endif
    </div>
  </div>
</div>
@stop