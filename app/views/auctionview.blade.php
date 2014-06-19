@extends('layouts.master')
@section('page-title')
{{{ $item_name or 'Invalid Item'}}}
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
        {{{ $user_name or 'Invalid User ID'}}}
      </div>
      <div class="text-center">
        <span class="label label-success">+500</span>
        <span class="label label-danger">-5</span>
      </div>
      <div>
        <small><i>{{ $description or 'No description'}}</small></i> </br>
        @if(isset($item_stats))
        <small>{{$item_stats}}</small><br>
        @endif
        @if(isset($item_notes))
        <small>{{ $item_notes }}</small>
        @endif
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
      Item Details
    </div>
    <div class="panel-body">
      Sorry, auctions aren't implemented yet. I'm working on them!
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
      <thead>
        <tr>
          <th>Leading Bid</th>
          <th></th>
        </tr>
        <tr class="success">
          <td><img src="/images/gold.gif"> <small>450,000</small></td>
          <td><div class="pull-right"><small>Rhaenyx</small></div></td>
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
    </table>
  </div>
</div>

@stop
