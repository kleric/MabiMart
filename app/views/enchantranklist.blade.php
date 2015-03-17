@extends('layouts.master')
@section('page-title')
Categories
@stop
@section('content')
<div class="page-header">
	<div class="col-md-6">
		<h1>Enchants</h1>
	</div>
	<div class="col-md-6">
		<form class="form" method="post" action="{{ URL::route('item-search') }}">
		<div class="input-group">
			<input class="form-control" type="text" name="search" placeholder="Seek and ye shall find">
			<span class="input-group-btn">
				<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
			</span>
		</div>
		</form>
	</div>
<div class="col-md-12">
<br/>
</div>
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
					<div class="item-thumbnail center-y">
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
					<div class="item-thumbnail center-y">
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
