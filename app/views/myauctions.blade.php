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
      You aren't selling anything!
    </div>
    @endif
  </div>
  <div class="panel panel-warning">
    <div class="panel-heading">
      Auctions I'm Bidding On
    </div>
    @if(isset($auctions_buying))
    <table class="table table-hover">
      <thead>
        <tr class="success">
          <td><strong>Item Name</strong></td>
          <td><strong>Current Offer</strong></td>
          <td><strong>End Time</strong></td>
        <tr>
      </thead>
      <tbody>
    @foreach($auctions_buying as $buying)
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
      You aren't bidding on anything!
    </div>
    @endif
  </div>
  <div class="panel panel-primary">
    <div class="panel-heading">
      Completed Auctions
    </div>
    
  </div>
</div>


@stop
