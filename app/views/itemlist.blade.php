@extends('layouts.master')
@section('page-title')
{{{ $category_name }}}
@stop
@section('content')
	<div class="page-header">
		<h1>{{{ $category_name }}}</h1>
	</div>
	<ol class="breadcrumb">
		<li><a href="{{ URL::route('categories') }}">Categories</a></li>
  		<li>{{{ $category_name }}}</li>
	</ol>
	@if(isset($description))
	{{{ $description }}}
	<br><br>
	@endif
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
	@section('script')
	<script type="text/javascript" charset="utf-8">
  		$(function() {
     			$("img.lazy").lazyload();
  		});
  	</script>
  	@stop
@stop
