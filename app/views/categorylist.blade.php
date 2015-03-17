@extends('layouts.master')
@section('page-title')
Categories
@stop
@section('content')
<div class="page-header">
	<h1>Items</h1>
</div>
<div>
	<p>From here you should be able to find any item that we have in our database. Either try searching for the item or you can browse through the categories in order to find it.</p>
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
	<h3>Browse by Category</h3>
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