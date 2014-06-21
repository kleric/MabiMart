@extends('layouts.master')
@section('page-title')
Categories
@stop
@section('content')
	<div class="page-header">
		<h1>Categories</h1>
	</div>
	<ol class="breadcrumb">
  		<li>Categories</li>
	</ol>
	<p>All the items are sorted into categories of some sort. Click on the one you're interested in.</p>
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