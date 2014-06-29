@extends('layouts.master')
@section('page-title')
Categories
@stop
@section('content')
<div class="page-header">
	<h1>Enchants</h1>
</div>
<ol class="breadcrumb">
	<li>Enchants</li>
</ol>
<div>
	@foreach ($enchantranks as $rank)
	@if ($rank != 16) 
	<a href="{{ URL::route('enchants', $rank) }}">
		<div class="col-md-2 col-sm-3 col-xs-6">
			<div class="panel panel-default">
				<div class="panel-body">
					<center>
					<div class="item-thumbnail">
						<center><img class="lazy" data-original="/images/items/2890.png"></center>
					</div>
					</center>
				</div>
				<div class="panel-footer text-center">
					<small>Rank {{{strtoupper(dechex($rank)) }}}</small>
				</div>
			</div>
		</div>
	</a>
	@else
	<a href="{{ URL::route('enchants', $rank) }}">
		<div class="col-md-2 col-sm-3 col-xs-6">
			<div class="panel panel-default">
				<div class="panel-body">
					<center>
					<div class="item-thumbnail">
						<center><img class="lazy" data-original="/images/items/2890.png"></center>
					</div>
					</center>
				</div>
				<div class="panel-footer text-center">
					<small>All Enchants</small>
				</div>
			</div>
		</div>
	</a>
	@endif
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
