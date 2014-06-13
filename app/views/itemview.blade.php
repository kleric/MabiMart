@extends('layouts.master')
@section('page-title')
{{{ $item_name or 'Invalid Item'}}}
@stop
@section('content')
	</br>
      <div class="col-md-5">
        <div class="panel panel-info">
          <div class="panel-heading">
            {{{ $item_name or 'Not a valid item'}}}
            <div class="pull-right">
              <a href="http://wiki.mabinogiworld.com/view/Nuadha_Robe_(F)" class="label label-primary">View Wiki</a>
            </div>
          </div>
          <div class="panel-body">
            <div class="media">
              <img class="media-object pull-left" src="/images/items/{{{$item_id or '2'}}}.png">
              <div class="media-body">
                <small><i>A robe that has been imbued with Nuadha's power. Nuadha's power is said to have been split amongst his robe, gauntlets, and boots. You can become more powerful as a Demigod if you equip all three items.</i></small></br></br>
                <small>{{ $description or 'No description'}}</small> </br>
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
      </div>
      <div class="col-md-7">
        <div class="panel panel-success">
          <div class="panel-heading">
            Ongoing Auctions
            <div class="pull-right">
            <a href="" class="label label-success">Sell Yours</a>
            </div>
          </div>
          <div class="panel-body">
            <i>Currently showing listings for the Alexina Server <a href="">Not your server?</a></i></br></br>
            <table class="table">
              <thead>
                <tr>
                  <td><b>Seller</b></td>
                  <td><b>Current Bid</b></td>
                  <td><b>Total Bids</b></td>
                  <td><b>Auction</b></td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Rhaenyx</td>
                  <td>15,000,000</td>
                  <td>1</td>
                  <td><a href="">Link</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
	
@stop
