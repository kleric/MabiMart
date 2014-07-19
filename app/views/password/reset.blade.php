@extends('layouts.master')
@section('page-title')
Reset Password
@stop
@section('content')
	<div class="page-header">
		<h1>Reset your password</h1>
	</div>
	<div class="col-md-4 col-md-offset-4">
		<form action="{{ action('RemindersController@postReset') }}" method="POST">
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
    			<input class="form-control" type="hidden" name="token" value="{{ $token }}">
    			<label for="email">Email</label>
    			<input class="form-control" placeholder="Email address" type="email" name="email">
    			<label for="password">Password</label>
    			<input class="form-control" placeholder="Password" type="password" name="password">
    			<label for="password_confirm">Confirm Password</label>
    			<input class="form-control" placeholder="Confirm Password" type="password" name="password_confirmation">
			</div>
			<div class="form-group col-md-12">
				<button type="submit" class="pull-right btn btn-success">Reset Password</button>
			</div>
			{{ Form::token() }}
		</form>
	</div>
@stop
