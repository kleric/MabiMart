@extends('layouts.master')
@section('page-title')
My Auctions
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
<div class="page-header">
  <h2>My Auctions</h2>
</div>
<div class="col-md-8 col-sm-8">
  <div class="panel panel-success">
    <div class="panel-heading">
      My Auctions (Selling)
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
          <td>{{{$sale->getStartingPrice()}}}
          <td>{{{$sale->getCurrentOffer()}}}</td>
          <td>{{{$sale->getEndTime() }}}</td>
        </tr>
      @endforeach
      </tbody>
    </table>
    </div>
    @else
    <div class="panel-body">
      <center>You aren't selling anything!</center>
    </div>
    @endif
  </div>
  <div class="panel panel-warning">
    <div class="panel-heading">
      Auctions I'm Bidding On
    </div>
    @if(isset($auctions_buying))
    <div class="table-responsive">
    <table class="table table-hover">
      <thead>
        <tr class="warning">
          <td><strong>Item Name</strong></td>
          <td><strong>Your Bid</strong></td>
          <td><strong>Current Offer</strong></td>
          <td><strong>End Time</strong></td>
        <tr>
      </thead>
      <tbody>
    @foreach($auctions_buying as $buying)
        <tr class="clickableRow" href="{{ URL::route('auction', $buying->id)}}">
          <td>{{{$buying->getItemName() }}}</td>
          <td>{{{$buying->getUserBid(Auth::user()->id) }}}
          <td>{{{$buying->getCurrentPrice()}}}</td>
          <td>{{{$buying->getEndTime() }}}</td>
        </tr>
      @endforeach
      </tbody>
    </table>
    </div>
    @else
    <div class="panel-body">
      <center>You aren't bidding on anything!</center>
    </div>
    @endif
  </div>
  @if(isset($auctions_ended) && count($auctions_ended) > 0)
  <div class="page-header">
    <h4>Completed Auctions</h4>
  </div>
  @foreach($auctions_ended as $ended)
    <div class="panel panel-default">
      <div class="panel-heading">
        {{{$ended->getItemName()}}}
      </div>
      <div class="panel-body">
        @if($ended->hasWinner())
        <div class="col-md-3 col-sm-3">
        <h5>Sold For</h5>
        {{{ $ended->getCurrentPrice() }}}
        </div>
        <div class="col-md-3 col-sm-3">
        <h5>Seller</h5>
        <a href="{{ URL::route('profile', $ended->getSellerId()) }}">{{{ $ended->getSeller() }}}</a>
        </div>
        <div class="col-md-3 col-sm-3">
        <h5>Buyer</h5>
        <a href="{{ URL::route('profile', $ended->getWinnerId()) }}">{{{ $ended->getWinner() }}}</a>
        </div>
        <div class="col-md-3 col-sm-3">
        <h5>Ended</h5>
        {{{ $ended->getEndTime() }}}
        </div>
        <div class="col-md-12 col-sm-12">
          <br/>
        </div>
        <div class="col-md-3 col-sm-3 col-md-offset-6 col-sm-offset-6">
        <a href="{{{ URL::route('create-review', $ended->id) }}}">Leave Feedback</a>
        </div>
        <div class="col-md-3 col-sm-3">
        <a href="{{{URL::route('auction', $ended->id) }}}" class="pull-right">View auction</a>
        </div>
        @else
        <center>No one won the auction :(</center>
        <div class="col-md-3 col-sm-3 col-md-offset-9 col-sm-offsset-9">
        <a href="{{{URL::route('auction', $ended->id) }}}" class="pull-right">View auction</a>
        </div>
        @endif
      </div>
    </div>
      @endforeach
    @else
    <div class="panel panel-default">
      <div class="panel-heading">
        Completed Auctions
      </div>
      <div class="panel-body">
        <center>You haven't won any auctions :(</center>
      </div>
    </div>
    @endif
</div>


@stop
