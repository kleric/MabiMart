@extends('layouts.master')
@section('page-title')
{{{ $item_name or 'Invalid Item'}}}
@stop
@section('content')
	</br>
      <div class="col-md-4">
        <div class="panel panel-info">
          <div class="panel-heading">
            {{{ $user_name or 'Uh oh'}}}
            <div class="pull-right">
              <a href="" class="label label-primary">View Profile</a>
            </div>
          </div>
          <div class="panel-body">
            <div class="text-center">
              <span class="label label-success">+500</span>
              <span class="label label-danger">-5</span>
            </div>
            <div class="media">
              <img class="media-object pull-left" src="/images/items/{{{$item_id or '2'}}}.png">
              <div class="media-body">
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
        </div>
        <ul class="list-group">
          <li class="list-group-item list-group-item-warning">Recent Feedback</li>
          <li class="list-group-item">Feedback not found</li>
        </ul>
      </div>
      <div class="col-md-4">
        <div class="panel panel-success">
          <div class="panel-heading">
            Ongoing Auctions
            <div class="pull-right">
            <a href="" class="label label-success">Sell Yours</a>
            </div>
          </div>
          <div class="panel-body">
            <b>Sorry, auctions aren't implemented yet. I'm working on them!</b>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div>
          <p class="text-center"><strong>Recent Offers</strong></p>
        </div>
        <ul class="list-group">
          <li class="list-group-item list-group-item-success"><small>100,000,000</small> <div class="pull-right"><small>Rhaenyx (+495)</div></small></li>
          <li class="list-group-item list-group-item-warning">90,000,000 <div class="pull-right"><small>Rhaenyx</small></div></li>
          <li class="list-group-item list-group-item-warning">80,000,000 <div class="pull-right"><small>Rhaenyx</small></div></li>
          <li class="list-group-item list-group-item-warning">70,000,000 <div class="pull-right"><small>Rhaenyx</small></div></li>
          <li class="list-group-item list-group-item-warning">60,000,000 <div class="pull-right"><small>Rhaenyx</small></div></li>
          <li class="list-group-item list-group-item-warning">50,000,000 <div class="pull-right"><small>Rhaenyx</small></div></li>
          <li class="list-group-item list-group-item-warning">40,000,000 <div class="pull-right"><small>Rhaenyx</small></div></li>
          <li class="list-group-item list-group-item-warning">30,000,000 <div class="pull-right"><small>Rhaenyx</small></div></li>
        </ul>
      </div>
	
@stop
