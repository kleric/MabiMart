@extends('layouts.master')
@section('page-title')
Item Search
@stop
@section('content')
<div class="page-header">
	<h1>Contact Me</h1>
</div>
<div class="col-md-12 col-sm-12">
	<div class="col-md-8 col-sm-8 col-xs-12">
	<p>Hey there, I'm glad that you found my site!</p>
	<p>MabiMart is supposed to be a simple website that serves as an online auction house for Mabinogi, a free to play MMORPG by devCat. 
	Currently MabiMart is being run and developed by a single person, and was coded up in about two weeks.</p>
	<p>I got rather annoyed at having to keep a shop open, or leaving a party ad open in order to just sell stuff, so I figured why not make a website that helps facilitate that?</p>
	<p>So I guess take a look around, I hope you like it!</p>
	<p>Oh as a side note, I'm still developing things right now, but if you have any feedback or suggestions feel free to contact me! There are a bunch of ways to reach me <a href="{{ URL::route('contact'); }}">here</a>.</p>
	</div>
	<div class="col-md-4 col-sm-4 hidden-xs">
		<img src="images/pan_bg.png">
	</div>

</div>
@stop
