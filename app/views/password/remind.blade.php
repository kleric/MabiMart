@extends('layouts.master')
@section('page-title')
Forgot Password
@stop
@section('content')
	<div class="page-header">
		<h1>Forgot your password?</h1>
	</div>
	<div class="col-md-4 col-md-offset-4">
		<form method="POST">
			@if ($errors->count() > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all('<li>:message</li>') as $err)
						{{$err}}
					@endforeach
				</ul>
			</div>
			@endif
			<div class="form-group">
    			<input class="form-control" type="email" placeholder="Email address" name="email">
			</div>
			<div class="form-group col-md-12">
				<button type="submit" class="pull-right btn btn-success">Reset Password</button>
			</div>
			{{ Form::token() }}
		</form>
	</div>
@stop
