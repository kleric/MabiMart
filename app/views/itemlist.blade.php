@extends('layouts.master')
@section('page-title')
Items
@stop
@section('content')
	<script>
		$(function() {
    			$("img.lazy").lazyload();
		});
	</script>
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
    			<center><img class="lazy" data-original="/images/items/{{{ $item->id }}}.png"></center>
    		</div>
    		<div>
	    		<b class="list-group-item-heading">{{{ $item->name }}}</b>
	    		<i class="list-group-item-text">{{{ $item->description }}}</i>
	    	</div>
  		</a>
  		@endforeach
	</div>
	
@stop
