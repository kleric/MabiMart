@extends('layouts.master')
@section('page-title')
Login
@stop
@section('content')
	<div class="page-header">
		<h1>Login</h1>
	</div>
	<div class="alert alert-warning">
		Don't have an account? Register <a href="/register">here</a>! It's guaranteed to be 98.3% painless!
	</div>
	<div class="col-md-4 col-md-offset-4">
		@if (Session::has('success_message'))
		<div class="alert alert-success">
			{{{Session::get('success_message')}}}
		</div>
		@endif
		@if (Session::has('error_message'))
		<div class="alert alert-danger">
			{{{Session::get('error_message')}}}
		</div>
		@endif
		<form method="post">
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
				<label for="inputEmail">Email</label>
        		<input type="text" required class="form-control" id="inputEmail" name="email" placeholder="Email Address"{{ Input::old('email') ? ' value="' . Input::old('email')  . '"' : ''}}>
        		<br>
				<label for="inputPassword">Password</label>
        		<input type="password" required class="form-control" id="inputPassword" name="password" placeholder="Password">
				<br>
				<div>
					<center>Remember Me <input type="checkbox" name="remember"></center>
				</div>
			</div>
			<div class="form-group col-md-12">
				<p class="pull-left">Forget your password? Reset it <a href="">here.</a></p>
				<button type="submit" class="pull-right btn btn-success">Login</button>
			</div>
			{{ Form::token() }}
		</form>
	</div>
@stop
