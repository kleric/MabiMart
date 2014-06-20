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
            <a href="" class="label label-success">Sell Yours</a>
            </div>
          </div>
          <div class="panel-body">
            <b>Sorry, auctions aren't implemented yet. I'm working on them!</b>
          </div>
        </div>
      </div>
	
@stop
