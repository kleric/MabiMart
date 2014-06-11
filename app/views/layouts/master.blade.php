<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>MabiMart | @yield('page-title')</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<link href="css/style.css" rel="stylesheet">
	</head>
	<body>
		<div class="container" id="logoarea">
			<div class="col-xs-2 col-md-2">
					<img src="images/logo.png">
			</div>
			<!--<div class="col-xs-3 pull-right col-md-2 text-right" id="userpanel">
				Welcome, <b>Guest</b>. </br> Please <a href="/login">Login</a> or <a href="/register">Register</a>.
			</div>-->
		</div>
		<div class="navbar-inverse navbar-default" role="navigation" id="navbar">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            					<span class="sr-only">Toggle navigation</span>
            					<span class="icon-bar"></span>
            					<span class="icon-bar"></span>
            					<span class="icon-bar"></span>
          			</button>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li><a href="#">Home</a></li>
						@if(Auth::check())
						<li>You successfully logged in.</li>
						@else
						<li><a href="{{ URL::route('login') }}">Login</a>
						@endif

					</ul>
				</div>
			</div>
		</div>
		<div class="container" id="content">
			@yield('content')
			<div id="footer" class="col-md-12 col-xs-12">
				Copyright &copy; 2014 MabiMart. Built lovingly with <a href="http://getbootstrap.com/">Bootstrap</a>.
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>