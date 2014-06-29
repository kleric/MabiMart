@extends('layouts.master')
@section('page-title')
{{{ $rank }}} Enchants
@stop
@section('content')
<div class="page-header">
	<h1>{{{ $rank }}} Enchants</h1>
</div>
<ol class="breadcrumb">
	<li><a href="{{ URL::route('enchantlist') }}">Enchants</a></li>
	<li>{{{ $rank }}} Enchants</li>
</ol>
<div class="page-header">
	<h2>Prefix Enchants</h2>
</div>
<div>
	@foreach ($prefix_list as $prefix)
	<a href="/enchant/view/{{{ $prefix->id }}}">
		<div class="col-md-2 col-sm-3 col-xs-6 item-container">
			<div class="panel panel-default">
				<div class="panel-body">
					<center>
					<div class="item-thumbnail center-y">
						<center><img class="lazy" data-original="/images/items/2890.png"></center>
					</div>
					</center>
				</div>
				<div class="panel-footer">
					<div>
						<small>{{{ $prefix->name }}}</small>
					</div>
				</div>
			</div>
		</div>
	</a>
	@endforeach
</div>
<div class="page-header col-md-12 col-sm-12 col-lg-12 col-xm-12">
	<h2>Suffix Enchants</h2>
</div>
<div>
	@foreach ($suffix_list as $suffix)
	<a href="/enchant/view/{{{ $suffix->id }}}">
		<div class="col-md-2 col-sm-3 col-xs-6 item-container">
			<div class="panel panel-default">
				<div class="panel-body">
					<center>
					<div class="item-thumbnail center-y">
						<center><img class="lazy" data-original="/images/items/2890.png"></center>
					</div>
					</center>
				</div>
				<div class="panel-footer">
					<div>
						<small>{{{ $suffix->name }}}</small>	
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
