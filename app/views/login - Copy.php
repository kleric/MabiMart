<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>MabiMart | Login</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<link href="css/style.css" rel="stylesheet">
	</head>
	<body>
		<div class="container" id="logoarea">
			<div class="col-xs-2 col-md-2">
					<img src="images/logo.png">
			</div>
			<div class="col-xs-3 pull-right col-md-2 text-right" id="userpanel">
				Welcome, <b>Guest</b>. </br> Please <a href="/login">Login</a> or <a href="/register">Register</a>.
			</div>
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
					</ul>
				</div>
			</div>
		</div>
		<div class="container" id="content">
			<div class="page-header">
				<h1>Login</h1>
			</div>
			<div class="alert alert-warning">
				Don't have an account? Register <a href="">here</a>! It's guaranteed to be 98.3% painless!
			</div>
			<div class="col-md-4 col-md-offset-4">
				<form method="post">
					<div class="form-group">
						<label for="inputUsername">Username</label>
        				<input type="text" required class="form-control" id="inputUsername" name="username" placeholder="Username">
        				<br>
						<label for="inputPassword">Password</label>
        				<input type="password" required class="form-control" id="inputPassword" name="password" placeholder="Password">
					</div>
					<div class="form-group col-md-12">
						<p class="pull-left">Forget your password? Reset it <a href="">here.</a></p>
						<button type="submit" class="pull-right btn btn-success">Login</button>
					</div>
				</form>
			</div>
			<div id="footer" class="col-md-12">
				Copyright &copy; 2014 MabiMart. Built lovingly with <a href="http://getbootstrap.com/">Bootstrap</a>.
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>