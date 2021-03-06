@extends('layouts.master')
@section('page-title')
All Auctions - Page {{{ $page }}}
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
  <h2>All Auctions <small>Page {{{ $page }}}</h2>
</div>
<ul class="pager">
  <li class="previous {{{ $page == 1 ? "disabled" : "" }}}"><a href="{{{ $page == 1 ? "#" : URL::route('auctions', $page - 1) }}}">&larr; Previous</a></li>
  <li class="next {{{ $page == $lastpage ? "disabled" : "" }}}"><a href="{{{ $page == $lastpage ? "#" : URL::route('auctions', $page + 1) }}}">Next &rarr;</a></li>
</ul>
<div class="col-md-3 col-sm-3">
  <div class="panel panel-default">
  <div class="panel-heading">
    Sort Options
  </div>
  <div class="panel-body">
    Considering Adding Sort options... we'll see.
  </div>
  </div>
</div>
<div class="col-md-9 col-sm-9">
  <div class="panel panel-success">
    <div class="panel-heading">
      Page {{{ $page }}}
    </div>
    @if(isset($all_auctions) && count($all_auctions) > 0)
    <div class="table-responsive">
    <table class="table table-hover">
      <thead>
        <tr class="success">
          <td><strong>Seller</strong></td>
          <td><strong>Item Name</strong></td>
          <td><strong>Starting Price</strong></td>
          <td><strong>Current Offer</strong></td>
          <td><strong>Autowin</strong></td>
          <td><strong>End Time</strong></td>
        <tr>
      </thead>
      <tbody>
      @foreach($all_auctions as $auction)
        <tr class="clickableRow" href="{{ URL::route('auction', $auction->id)}}">
          <td>{{{$auction->getSeller() }}}</td>
          <td>{{{$auction->getItemName()}}}@if($auction->quantity > 1) (x{{{ $auction->quantity }}}) @endif</td>
          <td>{{{$auction->getStartingPrice() }}}</td>
          <td>{{{$auction->getCurrentOffer() }}}</td>
          <td>{{{$auction->getAutowinPrice() }}}</td>
          <td>{{{$auction->getEndTime() }}}</td>
        </tr>
      @endforeach
      </tbody>
    </table>
    </div>
    @else
    <div class="panel-body">
      There's nothing for sale
    </div>
    @endif
  </div>
</div>


@stop
