@extends('layouts.master')
@section('page-title')
Register
@stop
@section('content')
	<div class="page-header">
		<h1>Create an Account</h1>
	</div>
	<div class="alert alert-warning">
		Have an account already? What are you doing here? <a href="/login">Login</a>!
	</div>
	<div class="col-md-4">
		<center><img class=".desktop-only" src="images/welcome.png"></center>
	</div>
	<div class="col-md-4">
		<div class="panel panel-success">
			<div class="panel-heading">
				Password Requirements
			</div>
			<div class="panel-body">
				Passwords must be more than 8 characters long and must contain special characters, numbers, uppercase letters, and lowercase letters.
			</div>
		</div>
		<div class="panel panel-info">
			<div class="panel-heading">
				Your E-mail
			</div>
			<div class="panel-body">
				Don't worry, we won't sell your e-mail. We only need it so we can verify your account. </br>
				</br>
				We also won't send you lame newsletters. Cause that'd be lame.
			</div>
		</div>
	</div>
	<div class="col-md-4">
		@if ($errors->count() > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all('<li>:message</li>') as $err)
				@if ($err == "<li>The confirmpassword and password must match.</li>")
					<li>Password Confirmation does not match.</li>
				@else 
					{{ $err }}
				@endif
				@endforeach
			</ul>
		</div>
		@endif
		<form action="{{ URL::route('register-post') }}" method="post">
			<div class="form-group">
				<label for="inputUsername">Username</label>
        		<input type="text" required class="form-control" id="inputUsername" name="username" 
        			placeholder="Username"{{ Input::old('username') ? ' value="' . Input::old('username')  . '"' : ''}}>
        		<br>
				<label for="inputEmail">Email</label>
        		<input type="email" required class="form-control" id="inputEmail" name="email" placeholder="Email"{{ Input::old('email') ? ' value="' . Input::old('email')  . '"' : ''}}>
        		<br>
				<label for="inputPassword">Password</label>
        		<input type="password" required class="form-control" id="inputPassword" name="password" placeholder="Password">
        		<br>
        		<label for="inputConfirmPassword">Confirm Password</label>
        		<input type="password" required class="form-control" id="inputConfirmPassword" name="confirmpassword" placeholder="Confirm your password">
			</div>
			<div class="form-group pull-right">
				<button type="submit" class="btn btn-success">Register</button>
			</div>
			{{ Form::token() }}
		</form>
	</div>
@stop
