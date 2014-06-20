@extends('layouts.master')
@section('page-title')
Items
@stop
@section('content')
	<div class="page-header">
		<h1>All Items</h1>
	</div>
	<ol class="breadcrumb">
  		<li>All Items</li>
	</ol>
	<div class="list-group">
		@foreach ($itemlist as $item)
  		<a href="/item/view/{{{ $item->id }}}" class="list-group-item clearfix">
  			<div class="item-thumbnail pull-left">
    			<center><img class="lazy" data-original="/images/items/{{{ $item->id }}}.png" width="48" height="48"></center>
    		</div>
    		<div>
	    		<b class="list-group-item-heading">{{{ $item->name }}}</b>
	    		<i class="list-group-item-text">{{{ $item->description }}}</i>
	    	</div>
  		</a>
  		@endforeach
	</div>
	<script src="/js/jquery.lazyload.min.js" type="text/javascript"></script>
	<script type="text/javascript" charset="utf-8">
  		$(function() {
     			$("img.lazy").lazyload();
  		});
  	</script>
@stop
