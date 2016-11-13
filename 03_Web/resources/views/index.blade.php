<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <title>gdb.kr | Smarthome Service</title>

    <link href="css/bootstrap.css" rel="stylesheet" />
	<link href="css/coming-sssoon.css" rel="stylesheet" />

    <!--     Fonts     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>
		<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
		<style>
		*{
			font-family: 'Josefin Sans', sans-serif !important;
		}
		</style>
</head>

<body>
<nav class="navbar navbar-transparent navbar-fixed-top" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        @if (Auth::guest())
            <li><a href="{{ url('/login') }}">Login</a></li>
            <li><a href="{{ url('/register') }}">Register</a></li>
        @else
            <li><a href="{{ url('/dashboard') }}">DashBoard</a></li>
            <!-- <li><a href="{{ url('/schedule') }}">Scheldule</a></li> -->
            <li><a href="{{ url('/logout') }}" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">Logout</a></li>
        @endif
       </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container -->
</nav>
<div class="main" style="background-image: url('img/bg.jpg')">

<!--    Change the image source '/images/default.jpg' with your favourite image.     -->

    <div class="cover black" data-color="black"></div>

<!--   You can change the black color for the filter with those colors: blue, green, red, orange       -->

    <div class="container">
        <h1 class="logo cursive">
            Welcome
        </h1>
<!--  H1 can have 2 designs: "logo" and "logo cursive"           -->

        <div class="content">
            <h4 class="motto">Improve your life with GDB.KR</h4>
            <div class="subscribe">
                <h5 class="info-text">
                    Copyright gdb.kr Co. 2016 All right reserved
                </h5>
                <h5 class="info-text">
                    Developed by Suhwan Cha, gdb.kr Co. CEO
                </h5>
                <h5 class="info-text">
                    View smarthome Project in <a href="https://github.com/SuhwanCha/Internet-Enabled-Automatic-DOG-Feeder-with-Raspberry-PI-3">Github</a>
                </h5>

            </div>
        </div>
    </div>
    <div class="footer">
      <div class="container">
             Designed by <a href="http://www.creative-tim.com">Creative Tim</a>.
      </div>
    </div>
 </div>
 <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
     {{ csrf_field() }}
 </form>

 </body>
   <script src="js/jquery-1.10.2.js" type="text/javascript"></script>
   <script src="js/bootstrap.min.js" type="text/javascript"></script>

</html>
