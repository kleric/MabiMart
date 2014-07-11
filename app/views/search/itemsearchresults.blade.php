@extends('layouts.master')
@section('page-title')
Results for {{{ $search }}}
@stop
@section('content')
<div class="page-header">
	<h2>Results for "{{{ $search }}}"</h2> <a href="{{{ URL::route('item-search') }}}">Back to search</a>
</div>
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
