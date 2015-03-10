@extends('layouts.master')
@section('page-title')
{{{ $user->username }}}
@stop
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
<div class="page-header col-md-12 col-sm-12 col-lg-12 col-xm-12">
  <h2>
    {{{ $user->username or 'Invalid User ID'}}}
    @if( $user->getFeedbackScore() >= 0)
        <span class="badge">+{{{ $user->getFeedbackScore() }}}</span>
        @else
        <span class="badge">-{{{ $user->getFeedbackScore() }}}</span>
        @endif
  </h2>
</div>
<div class="col-md-3">
      <center>
      </center>
  <div class="panel panel-default">
    <div class="panel-heading">
      Bulletin
    </div>
    <div class="panel-body">
      {{ $user->getBulletin() }}
    </div>
  </div>
</div>
<div class="col-md-9">
  <div class="panel panel-default">
    <div class="panel-heading">
      Contact Me
      <div class="pull-right">
        <a href="{{ URL::route('create-message', $user->id) }}" class="label label-primary"><i class="fa fa-paper-plane"></i> PM</a>
      </div>
    </div>
    <div class="panel-body">
      <small><i>To reach me for trades...</i></small><br/>
      {{ $user->getContactDetails() }}
    </div>
  </div>
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
        </a>
        <div class="media-body">
          @if ($review->getRating() > 0) 
          <span class="label label-success pull-right">Positive</span>
          @elseif ($review->getRating() < 0)
          <span class="label label-danger pull-right">Negative</span>
          @else
          <span class="label label-default pull-right">Neutral</span>
          @endif
          <h4 class="media-heading">
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
    <div class="table-responsive">
    <table class="table table-hover">
      <thead>
        <tr class="success">
          <td><strong>Item Name</strong></td>
          <td><strong>Starting Price</strong></td>
          <td><strong>Current Offer</strong></td>
          <td><strong>End Time</strong></td>
        <tr>
      </thead>
      <tbody>
      @foreach($auctions_selling as $sale)
        <tr class="clickableRow" href="{{ URL::route('auction', $sale->id)}}">
          <td>{{{$sale->getItemName()}}}</td>
          <td>{{{$sale->getStartingPrice()}}}</td>
          <td>{{{$sale->getCurrentOffer()}}}</td>
          <td>{{{$sale->getEndTime() }}}</td>
        </tr>
      @endforeach
      </tbody>
    </table>
    </div>
    @else
    <div class="panel-body">
      <center>They have nothing for sale!</center>
    </div>
    @endif
  </div>
</div>
@stop
