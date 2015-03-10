@extends('layouts.master')
@section('page-title')
Home
@stop
@section('content')
	<br>
	<div class="jumbotron" id="jumbo-intro">
		<h1>Hello, MabiMart!</h1>
		<p>Welcome to the MabiMart test server, a up and coming site for selling stuff you don't want to buy things that you do.</p>
		<p><a href="{{{ URL::route('register') }}}" class="btn btn-success" role="button">Test Drive?</a></p>
	</div>
	<div>
		<div class="col-md-8 col-sm-8">
			<div class="page-header">
				<h2>News  <small> Recent Updates</small></h2>
			</div>
			<div>
				<h4>Revival? <small>3/10/2015</small></h4>
				<p>Trying to get stuff back up and running. A few various planned changes, I'll keep you posted. Experiment with the site I guess, but be wary this is only a test server at the moment. Things can change at any time.</p>
				<p>Oh if you have any questions, thoughts, suggestions, feedback, add me on Nihl</p>

			</div>
		</div>
		<div class="col-md-4 col-sm-4">
			<div class="page-header">
				<h2>Useful Sites</h2> 
			</div>
			<ul>
				<li><a href="http://wiki.mabinogiworld.com/">Mabinogi Wiki</a></li>
			</ul>
		</div>
	</div>
@stop
