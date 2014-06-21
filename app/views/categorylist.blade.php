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
		@foreach ($categorylist as $category)
  		<a href="/items/{{{ $category->urlname }}}" class="list-group-item clearfix">
  			<div class="item-thumbnail pull-left">
    			<center><img class="lazy" data-original="/images/items/{{{ $category->thumbnail_item_id }}}.png"></center>
    		</div>
    		<div>
	    		<b class="list-group-item-heading">{{{ $category->name }}}</b>
	    		<i class="list-group-item-text">{{{ $category->description }}}</i>
	    	</div>
  		</a>
  		@endforeach
	</div>
	<script type="text/javascript" charset="utf-8">
  		$(function() {
     			$("img.lazy").lazyload();
  		});
  	</script>
@stop