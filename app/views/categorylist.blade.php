@extends('layouts.master')
@section('page-title')
Categories
@stop
@section('content')
<div class="page-header">
	<h2>Search</h2>
</div>
<div class="col-md-8 col-md-offset-2">
<form class="form" method="post" action="{{ URL::route('item-search') }}">
	<div class="input-group">
		<input class="form-control" type="text" name="search" placeholder="Seek and ye shall find">
		<span class="input-group-btn">
			<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
		</span>
	</div>
</form>
<br/>
</div>
<br/>
<div class="col-md-12 col-s"><br/></div>
<div class="page-header">
	<h2>Categories</h2>
</div>
<ol class="breadcrumb">
	<li>Categories</li>
</ol>
<div>
	@foreach ($categorylist as $category)
	<a href="/items/{{{ $category->urlname }}}">
		<div class="col-md-2 col-sm-3 col-xs-6">
			<div class="panel panel-default">
				<div class="panel-body">
					<center>
					<div class="item-thumbnail center-y">
						<center><img class="lazy" data-original="/images/items/{{{ $category->thumbnail_item_id }}}.png"></center>
					</div>
					</center>
				</div>
				<div class="panel-footer text-center">
					<small>{{{ $category->name }}}</small>
					<!--<i class="list-group-item-text">{{{ $category->description }}}</i>-->
				</div>
			</div>
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
