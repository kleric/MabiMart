<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>MabiMart | @yield('page-title')</title>
		<link href="/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="/css/font-awesome.min.css">
		<link href="/css/style.css" rel="stylesheet">
	</head>
	<body>
		<div class="container" id="logoarea">
			<div class="col-xs-2 col-md-2">
					<img src="/images/logo.png">
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
						<li><a href="/">Home</a></li>
						<li><a href="{{ URL::route('categories') }}">Items</a></li>
						<li><a href="">Enchants</a></li>
						<li><a href="">Reforges</a></li>
						<li><a href="">Auctions</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
          				@if(Auth::check())
          				<li role="presentation" class="dropdown-header">Hi Rhaenyx</li>
          				<li role="presentation" class="divider"></li>
          				<li><a href="{{ URL::route('logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
          				@else
          				<li><a href="{{ URL::route('register') }}"><i class="fa fa-users"></i> Register</a>
          				<li><a href="{{ URL::route('login') }}"><i class="fa fa-sign-in"></i> Login</a>
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
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/jquery.lazyload.min.js" type="text/javascript"></script>
		@yield('script')
		<script>
  			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  			ga('create', 'UA-52112345-1', 'mabimart.com');
  			ga('send', 'pageview');
		</script>
	</body>
</html>
