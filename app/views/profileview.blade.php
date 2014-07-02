@extends('layouts.master')
@section('page-title')
{{{ $user->username }}}
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
      <small><i>A little about me...</i></small> <br/>
      {{{ $user->getAboutMe() }}}
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      Contact Information
    </div>
    <div class="panel-body">
      <small><i>To reach me for trades...</i></small><br/>
      {{{ $user->getContactDetails() }}}
    </div>
  </div>
</div>
<div class="col-md-9">
  <div class="panel panel-info">
    <div class="panel-heading">
      Recent Feedback
      @if(isset($reviews) && count($reviews) > 0)
      <div class="pull-right">
        <a href="#" class="label label-primary">See All</a>
      </div>
      @endif
    </div>
    <div class="panel-body">
    @if(isset($reviews) && count($reviews) > 0)
    @foreach($reviews as $review)
      <div class="media">
        <a class="pull-left" href="{{ URL::route('profile', $review->getReviewer()->id) }}">
        <img class="media-object" src="{{{ $review->getReviewer()->getGravatarUrl() }}}&s=50" alt="...">
        </a>
        <div class="media-body">
          <h4 class="media-heading">
            @if ($review->getRating() > 0) 
          <span class="label label-success">Positive</span>
          @elseif ($review->getRating() < 0)
          <span class="label label-danger">Positive</span>
          @else
          <span class="label label-default">Positive</span>
          @endif
            <a href="{{ URL::route('profile', $review->getReviewer()->id) }}">{{{ $review->getReviewer()->getUsername() }}}</a>
          </h4>
 
          {{{ $review->getReview()}}}
        </div>
      </div>
      @endforeach
      @else
        <center>No reviews yet...</center>
      @endif
    </div>
  </div>
  <div class="panel panel-success">
    <div class="panel-heading">
      Selling
    </div>
    @if(isset($auctions_selling) && count($auctions_selling) > 0)
    <table class="table table-hover">
      <thead>
        <tr class="success">
          <td><strong>Item Name</strong></td>
          <td><strong>Current Offer</strong></td>
          <td><strong>End Time</strong></td>
        <tr>
      </thead>
      <tbody>
      @foreach($auctions_selling as $sale)
        <tr class="clickableRow" href="{{ URL::route('auction', $sale->id)}}">
          <td>{{{$sale->getItemName()}}}</td>
          <td>{{{$sale->getCurrentPrice()}}}</td>
          <td>{{{$sale->getEndTime() }}}</td>
        </tr>
      @endforeach
      </tbody>
    </table>
    @else
    <div class="panel-body">
      <center>They have nothing for sale!</center>
    </div>
    @endif
  </div>
</div>
@stop
