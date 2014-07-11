@extends('layouts.master')
@section('page-title')
Item Search
@stop
@section('content')
<div class="page-header">
	<h2>Search for an Item</h2>
</div>
<div class="col-md-8 col-md-offset-2">
<form class="form" method="post">
	<div class="input-group">
		<input class="form-control" type="text" name="search" placeholder="Seek and ye shall find">
		<span class="input-group-btn">
			<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
		</span>
	</div>
</form>
<br/>
<br/>
</div>
@stop
