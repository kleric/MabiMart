@extends('layouts.master')
@section('page-title')
Home
@stop
@section('content')
	<br>
	<div class="jumbotron" id="jumbo-intro">
		<h1>Hello, MabiMart!</h1>
		<p>MabiMart has has gone Alpha, trades are officially open! Say hello to a way to buy and sell items without all the hassle.</p>
		<p><a href="{{{ URL::route('register') }}}" class="btn btn-success" role="button">Get Trading!</a></p>
	</div>
	<div>
		<div class="col-md-8 col-sm-8">
			<div class="page-header">
				<h2>News  <small> Recent Updates</small></h2>
			</div>
			<div>
				<h4>The Basics <small>7/9/2014</small></h4>
				The basic functionality should now all be up and running, so auctions are now <strong>officially</strong> open!<br/>
				<br/>
				What does that mean? All the functionality revolving basic auctions should now be working. You should be able to send messages, view messages, leave feedback, win auctions, create auctions, etc.
				<br/><br/>
				Unfortunately, that also means I'm wiping the database, as all the prior stuff was merely there for you to experiment with. No worries, from here on out, I'll try not to touch the database except for adding items and such.
				<br/><br/>
				From now on I'll be focusing on adding new features, but any bugs I find (or people report) will be top priority.

				Thanks! Checkout the <a href="http://forums.mabimart.com/">forums</a> for more information.

				<br/><br/>
				Thanks!
				 <br/>Nihl
				 <br/><br/>
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
