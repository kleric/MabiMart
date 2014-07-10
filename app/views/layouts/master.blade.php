<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>MabiMart | @yield('page-title')</title>
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	@yield('css')
	<link rel="stylesheet" href="/css/font-awesome.min.css">
	<link href="/css/style.css" rel="stylesheet">
	<link rel="shortcut icon" type="image/png" href="/favicon.png"/>
</head>
<body>
	<div class="container" id="logoarea">
		<div class="col-xs-2 col-md-2">
			<img src="/images/alpha_logo.png">
		</div>
		<div class="hidden-phone pull-right col-md-2 text-right" id="timepanel">
				<center>Mart Time: <span id="servertime">{{ date("H:i:s", time()) }}</span></center>
		</div>
		</div>
		<div class="navbar-default" role="navigation" id="navbar">
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
						<li><a href="{{ URL::route('enchantlist') }}">Enchants</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Auctions <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								@if(Auth::check())
								<li><a href="{{ URL::route('dashboard') }}">My Auctions</a></li>
								<li><a href="{{ URL::route('categories') }}">Add Auction</a></li>
								@endif
								<li><a href="{{ URL::route('all-auctions') }}">All auctions</a></li>
								<li><a href="#">Ending Soon</a></li>
								<li><a href="#">Search</a></li>
							</ul>
						</li>
						<li><a href="http://forums.mabimart.com/">Forums</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						@if(Auth::check())
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{{ Auth::user()->username }}}</a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ URL::route('profile', Auth::user()->id) }}"><span class="fa fa-user"></span> My Profile</a></li>
								<li><a href="{{ URL::route('profile-edit') }}"><span class="fa fa-pencil"></span> Edit Profile</a></li>
								<li><a href="#"><span class="fa fa-cog"></span> Account Settings</a></li>
							</ul>
						</li>
						<li><a href="{{ URL::route('inbox') }}"><span class="fa fa-inbox"></span> Inbox <span class="badge">{{ Auth::user()->getUnreadInboxCount() }}</span></a></a></li>
						<li><a href="{{ URL::route('logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
						@else
						<li><a href="{{ URL::route('register') }}">Register</a></li>
						<li><a href="{{ URL::route('login') }}">Login</a></li>
						@endif
					</ul>
				</div>
			</div>
		</div>
		<div class="container" id="content">
			@if(null !== Session::get('success_message'))
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				{{{ Session::get('success_message') }}}
			</div>
			@endif
			@if(null !== Session::get('error_message'))
			<div class="alert alert-danger alert-dismissable" role="alert">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				{{{ Session::get('error_message') }}}
			</div>
			@endif
			@yield('content')
			<div id="footer" class="col-md-12 col-xs-12">
				<center>
					About Us | Contact Us | Give Feedback
				</center>
				<br/>
				Copyright &copy; 2014 MabiMart. Built lovingly with <a href="http://getbootstrap.com/">Bootstrap</a>.
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/jquery.lazyload.min.js" type="text/javascript"></script>
		<script type="text/javascript">
var currenttime = '{{ date("F d, Y H:i:s", time()) }}'; //PHP method of getting server date

var serverdate=new Date(currenttime);

function padlength(what){
var output=(what.toString().length==1)? "0"+what : what;
return output;
}

function displaytime(){
serverdate.setSeconds(serverdate.getSeconds()+1);
var timestring=padlength(serverdate.getHours())+":"+padlength(serverdate.getMinutes())+":"+padlength(serverdate.getSeconds());
document.getElementById("servertime").innerHTML = timestring;
}

window.onload=function(){
setInterval("displaytime()", 1000);
}

</script>
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
