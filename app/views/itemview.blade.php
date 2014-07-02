@extends('layouts.master')
@section('page-title')
{{{ $item_name or 'Invalid Item'}}}
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
            {{{ $item_name or 'Not a valid item'}}}
            <div class="pull-right">
              @if(isset($wiki_link)) 
              <a href="{{{ $wiki_link }}}" class="label label-primary">View Wiki</a>
              @endif
            </div>
          </div>
          <div class="panel-body">
            <div class="media">
              <img class="media-object pull-left" src="{{{ $imgurl }}}">
              <div class="media-body">
                <small><i>{{ $description or 'No description'}}</small></i> </br>
                @if(isset($item_stats))
                <small>{{$item_stats}}</small><br>
                @endif
                @if(isset($item_notes))
                <br>
                <div class="itemnotes">
                	<small>{{ $item_notes }}</small>
                </div>
                @endif
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
            <a href="{{ URL::route('createauction-get', $item_id) }}" class="label label-success">Sell Yours</a>
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
              <center><p>Sorry, no one is selling this :(</p></center>
            </div>
            @endif

        </div>
      </div>
	
@stop
