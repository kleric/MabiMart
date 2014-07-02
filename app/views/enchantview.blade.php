@extends('layouts.master')
@section('page-title')
@if(isset($enchant))
{{{ $enchant->name }}}
@else
Invalid Enchant
@endif
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
	</br>
      <div class="col-md-5">
        <div class="panel panel-info">
          <div class="panel-heading">
            {{{ $enchant->name }}} - Rank  {{{strtoupper(dechex($enchant->rank)) }}} - {{{ ($enchant->type == 1) ? "Prefix" : "Suffix"}}}
          </div>
          <div class="panel-body">
            <div class="media">
              <img class="media-object pull-left" src="/images/items/2890.png">
              <div class="media-body">
                <div class="itemnotes">
                <small>{{ $enchant->effects }}</small></br>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-7">
        <div class="panel panel-success">
          <div class="panel-heading">
            Ongoing Auctions
            <div class="pull-right">
            <a href="{{ URL::route('createauction-get', 2890) }}" class="label label-success">Sell Yours</a>
            </div>
          </div>
          
            <table class="table">
              <thead>
                <tr class="success">
                  <td><strong>Server</strong></td>
                  <td><strong>Seller</strong></td>
                  <td><strong>Current Price</strong></td>
                  <td><strong>Ends</strong></td>
                </tr>
              </thead>
              <tbody>
              @if(count($auctions) > 0)
              @foreach ($auctions as $auction) 
                <tr class="clickableRow" href="{{ URL::route('auction', $auction->id) }}">
                  <td>{{{ $auction->getSeller() }}}</td>
                  <td>{{{ $auction->getCurrentPrice() }}}</td>
                  <td>{{{ $auction->getEndTime() }}}
                </tr>
              @endforeach
              @endif
              </tbody>
            </table>
            @if(count($auctions) == 0)
            <div class="panel-body">
              <center>Sorry, no one is selling items with this enchant. :(</center>
            </div>
            @endif

        </div>
      </div>
	
@stop
