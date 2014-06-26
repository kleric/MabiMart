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
<div>
	@foreach ($categorylist as $category)
	<a href="/items/{{{ $category->urlname }}}">
		<div class="col-md-2 col-sm-3 col-xs-4">
			<div class="panel panel-default">
				<div class="panel-body">
					<center>
					<div class="item-thumbnail">
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