@extends('layouts.master')
@section('page-title')
Home
@stop
@section('content')
	<br>
	<div class="jumbotron" id="jumbo-intro">
		<h1>Hello, world!</h1>
		<p>MabiMart has arrived! An online item trading site for Mabinogi! A way to buy and sell items without all the hassle.</p>
		<p><a href="{{{ URL::route('register') }}}" class="btn btn-success" role="button">Get Trading!</a></p>
	</div>
	<div>
		<div class="col-md-8 col-sm-8">
			<div class="page-header">
				<h2>News  <small> Recent Updates</small></h2>
			</div>
		</div>
		<div class="col-md-4 col-sm-4">
			<div class="page-header">
				<h2>Useful Sites</h2> 
			</div>
			<ul>
				<li><a href="https://www.facebook.com/groups/Alexinaserver/">Alexina Facebook Group</a></li>
				<li><a href="http://wiki.mabinogiworld.com/">Mabinogi Wiki</a></li>
			</ul>
		</div>
	</div>
@stop
