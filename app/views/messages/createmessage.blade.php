@extends('layouts.messages')
@section('page-title')
Send Message
@stop
@section('msgs')
<div class="col-md-8">
  <div class="panel panel-info">
    <div class="panel-heading">
      Send message to {{{ $reciever_name }}}
    </div>
    <div class="panel-body">
      <form class="form" method="post">
        <label for="subject">Subject</label>
        <input type="text" class="form-control" name="subject" value="{{{ isset($subject) ? $subject : "" }}}">
        <br/>
        <label for="message">Message</label>
        <textarea name="content" class="form-control" rows="8"></textarea>
        <br/>
        <input type="submit" value="Send" class="btn btn-success pull-right">
        {{ Form::token() }}
      </form>
    </div>
  </div>
</div>
@stop