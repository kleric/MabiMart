@extends('layouts.master')
@section('page-title')
{{{ $user_name or 'Invalid User ID'}}}'s {{{ $item_name or 'Invalid Item'}}}
@stop
@section('content')
</br>
<div class="col-md-3">
  <div class="panel panel-info">
    <div class="panel-heading">
      Seller
      <div class="pull-right">
        <a href="{{{ URL::route('profile', $user_id) }}}" class="label label-primary">View Profile</a>
      </div>
    </div>
    <div class="panel-body">
      <div class="text-center">
        <img src="{{{ $seller->getGravatarUrl() }}}"/><br/>
        <small>{{{ $user_name or 'Invalid User ID'}}}</small>
      </div>
      <div class="text-center">
        @if( $seller->getFeedbackScore() > 0)
        <span class="label label-success">+{{{ $seller->getFeedbackScore() }}}</span>
        @elseif( $seller->getFeedbackScore() == 0)
        <span class="label label-default">+{{{ $seller->getFeedbackScore() }}}</span>
        @else
        <span class="label label-danger">-{{{ $seller->getFeedbackScore() }}}</span>
        @endif
      </div>
      <div>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      Contact Information
    </div>
    <div class="panel-body">
      {{{ $seller->getContactDetails() }}}
    </div>
  </div>
</div>
<div class="col-md-5">
  <div class="panel panel-success">
    <div class="panel-heading">
      Item Details
      <div class="pull-right">
        @if(isset($wiki_link)) 
        <a href="{{{ $wiki_link }}}" class="label label-success">View Wiki</a>
        @endif
      </div>
    </div>
    <div class="panel-body">
      {{{ $item_name or 'Not a valid item'}}} @if ($auction->quantity > 1) (x{{{ $auction->quantity }}}) @endif
      <br/>
      <div class="media">
        <img class="media-object pull-left" src="{{{ $imgurl }}}">
        <div class="media-body">
          <small><i>{{ $item_description or 'No description'}}</small></i> </br>
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
      @if(isset($auction->prefix_enchant_id) || isset($auction->suffix_enchant_id))
      <br/>
      Enchants <br/>
      @if(isset($auction->prefix_enchant_id))
      <div class="col-md-6 col-sm-6">
      <small>Prefix</small>
      {{ $auction->getPrefixDescription()}}
      </div>
      @endif
      @if(isset($auction->suffix_enchant_id))
      <div class="col-md-6 col-sm-6">
      <small>Suffix</small>
      {{ $auction->getSuffixDescription()}}
      </div>
      @endif
      @endif
    </div>
  </div>
  @if(isset($auction->description) && !empty($auction->description))
  <div class="panel panel-primary">
    <div class="panel-heading">
      Auction Details
    </div>
    <div class="panel-body">
      <strong>Description</strong><br/>
      {{{ $auction->description }}}
    </div>
  </div>
  @endif
  @if(isset($reforged) && $reforged || $auction->getReforgeRank() < 3)
  <div class="panel panel-default">
    <div class="panel-heading">
        Rank {{{ $auction->getReforgeRank() }}} Reforge
    </div>
    @if($reforged) 
    <div class="panel-body">
      {{ $auction->getReforge(1) }}
      {{ $auction->getReforge(2) }}
      {{ $auction->getReforge(3) }}
    </div>
    @endif
  </div>
  @endif
</div>
<div class="col-md-4">
  <div class="panel panel-default">
    <div class="panel-heading">
      Recent Offers
    </div>
    <div class="panel-body">
      @if($auction->isOver())
      <center>This auction has already ended.</center>
      @elseif(!Auth::check()) 
      You must be logged in to bid.
      @elseif($seller_id == Auth::user()->id)
      You can't bid on your own item!
      @else
      @if($errors->count() > 0)
      <div class="alert alert-danger" role="alert">
        @foreach ($errors->all('<li>:message</li>') as $err)
        @if ($err == "<li>The confirmpassword and password must match.</li>")
        <li>Password Confirmation does not match.</li>
        @else 
        {{ $err }}
        @endif
        @endforeach
      </div>
      <br/>
      @endif
      Interested? Make a bid! 

      <br>
      <br>
      <form action="{{ URL::route('auction-post', $auction_id) }}" method="post">
        <div class="input-group input-group-sm col-md-8 col-md-offset-2">
          <input class="form-control" type="text" inputtype="numeric" name="amount">
          <span class="input-group-btn">
            <input type="submit" value="Bid" class="btn btn-default" type="button">
          </span>
        </div>
        {{ Form::token() }}
      </form>
      @endif
    </div>
    @if (isset($auction->minprice) && $auction->minprice > 1000)
    <div class="panel-heading">
      <small>Reserve Price: {{{ number_format($auction->minprice) }}}</small>
    </div>
    @endif
    @if(isset($auction->autowin)&& $auction->autowin > 1000)
    <div class="panel-heading">
      Autowin: {{{ number_format($auction->autowin) }}}
    </div>
    @endif
    <table class="table">
      @if(isset($leading_bid))
      <thead>
        <tr>
          @if($auction->isOver())
          <th>Winning Bid</th>
          @else
          <th>Leading Bid</th>
          @endif
          <th></th>
        </tr>
        <tr class="success">
          <td><img src="/images/gold.gif"> <small>{{{ $leading_bid->getAmount() }}}</small></td>
          <td><div class="pull-right"><small>{{{ $leading_bid->getBidder() }}}</small></div></td>
        </tr>
        <tr>
          <th>Previous Bids</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @if(count($bid_offers) >= 1)
        @foreach ($bid_offers as $bid)
        <tr class="danger">
          <td><small>{{{ $bid->getAmount() }}}</small></td>
          <td><div class="pull-right"><small>{{{ $bid->getBidder() }}}</small></div></td>
        </tr>
        @endforeach
        @else
        <tr>
          <td><small>No other bids</small></td>
          <td></td>
        </tr>
        @endif
      </tbody>
      @else
      <thead>
        <tr>
          <th>Starting Price</th>
        </tr>
        <tr class="warning">
          <td><span class="pull-right" >{{{ $auction->getStartingPrice() }}} <img src="/images/gold.gif"></span></td>
        </tr>
      </thead>
      @endif
    </table>
  </div>
</div>

@stop
