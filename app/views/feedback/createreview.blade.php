@extends('layouts.master')
@section('page-title')
Reviewing {{{ $user->username }}}
@stop
@section('content')
</br>
<div class="col-md-3">
  <div class="panel panel-default">
    <div class="panel-heading">
      {{{ $user->username or 'Invalid User ID'}}}
    </div>
    <div class="panel-body">
      <div class="text-center">
        <img src="{{{ $user->getGravatarUrl() }}}"/><br/>
      </div>
      <br/>
      <center><a href="{{ URL::route('create-message', $user->id) }}" class="label label-primary">Send a message</a></center>
    </div>
  </div>
</div>
<div class="col-md-9">
    <div class="panel panel-default">
    <div class="panel-heading">
      Leave Feedback for {{{$user->username}}}
    </div>
    <div class="panel-body">
      You are leaving feedback for the auction of <a href="{{ URL::route('auction', $auction->id) }}">{{{ $auction->getItemName() }}}</a>. <br/>
      <form class="form" method="post">
        <div class="radio">
          <label>
          <input type="radio" name="rating" value="1"> Positive
          </label>
        </div>
        <div class="radio">
          <label>
          <input type="radio"name="rating" value="0" checked>Neutral
          </label>
        </div>
        <div class="radio">
          <label>
          <input type="radio" name="rating" value="-1">Negative
          </label>
        </div>
        <div class="form-group">
        <textarea name="review" class="form-control" placeholder="Leave a comment, you have 155 characters."></textarea>
        </div>
        <input type="submit" class="btn btn-success pull-right" value="Submit Feedback">
        {{ Form::token() }}
      </form>
    </div>
  </div>
</div>
@stop
