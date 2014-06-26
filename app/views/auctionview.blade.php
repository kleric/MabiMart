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
        <a href="" class="label label-primary">View Profile</a>
      </div>
    </div>
    <div class="panel-body">
      <div class="text-center">
        <small>{{{ $user_name or 'Invalid User ID'}}}</small>
      </div>
      <div class="text-center">
        <span class="label label-success">+500</span>
        <span class="label label-danger">-5</span>
      </div>
      <div>
      </div>
    </div>
  </div>
  <ul class="list-group">
    <li class="list-group-item list-group-item-warning">Recent Feedback</li>
    <li class="list-group-item">Feedback not found</li>
  </ul>
</div>
<div class="col-md-5">
  <div class="panel panel-success">
    <div class="panel-heading">
            {{{ $item_name or 'Not a valid item'}}}
            <div class="pull-right">
              @if(isset($wiki_link)) 
              <a href="{{{ $wiki_link }}}" class="label label-success">View Wiki</a>
              @endif
            </div>
          </div>
          <div class="panel-body">
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
          </div>
  </div>
</div>
<div class="col-md-4">
  <div class="panel panel-default">
    <div class="panel-heading">
      Recent Offers
    </div>
    <div class="panel-body">
      Interested? Make a bid! 

      <br>
      <br>
      <form>
        <div class="input-group input-group-sm col-md-8 col-md-offset-2">
          <input class="form-control" type="text" inputtype="numeric" name="amount">
          <span class="input-group-btn">
            <input type="submit" value="Bid" class="btn btn-default" type="button">
          </span>
        </div>
      </form>
    </div>
    <table class="table">
      @if(isset($leading_bid_amount))
      <thead>
        <tr>
          <th>Leading Bid</th>
          <th></th>
        </tr>
        <tr class="success">
          <td><img src="/images/gold.gif"> <small>{{{ $leading_bid_amount }}}</small></td>
          <td><div class="pull-right"><small>{{{ $leading_bid_username }}}</small></div></td>
        </tr>
        <tr>
          <th>Previous Bids</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr class="danger">
          <td><small>450,000</small></td>
          <td><div class="pull-right"><small>Rhaenyx</small></div></td>
        </tr>
        <tr class="danger">
          <td><small>250,000</small></td>
          <td><div class="pull-right"><small>Rhaenyx</small></div></td>
        </tr>
      </tbody>
      @else
      <thead>
        <tr>
          <th>Starting Price</th>
        </tr>
        <tr class="warning">
          <td><span class="pull-right" >400,000 <img src="/images/gold.gif"></span></td>
        </tr>
      </thead>
      @endif
    </table>
  </div>
</div>

@stop
