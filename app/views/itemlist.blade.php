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
<div>
	@foreach ($itemlist as $item)
	<a href="/item/view/{{{ $item->id }}}">
		<div class="col-md-2 col-sm-3 col-xs-6 item-container">
			<div class="panel panel-default">
				<div class="panel-body">
					<center>
					<div class="item-thumbnail center-y">
						<center><img class="lazy" data-original="/images/items/{{{ $item->id }}}.png"></center>
					</div>
					</center>
				</div>
				<div class="panel-footer">
					<div>
						<small>{{{ $item->name }}}</small>
						<!--<i class="list-group-item-text">{{{ $item->description }}}</i>-->
					</div>
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
