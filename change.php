<?php
	session_start();
	if(!isset($_SESSION['ID']))
	{
		require('loginfunction.php');
		redirect_user('login.html');
	}	
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> </html><![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> </html><![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> </html><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>register</title>
	<meta name="description" content="Tour Pal Home" />
	<meta name="author" content="solojoe" />
	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="./stylesheets/base.css" />
	<link rel="stylesheet" href="./stylesheets/skeleton.css" />
	<link rel="stylesheet" href="./stylesheets/layout.css" />
	<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400italic' rel='stylesheet' type='text/css' />

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<!-- Favicons================================================== -->

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
        <script type="text/javascript" src="./js/jquery.eislideshow.js"></script>
        <script type="text/javascript" src="./js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="./js/jquery.tweet.js"></script>		
        <script type="text/javascript" src="./js/custom.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>
<div class="header">
<div class="container">
<div class="Catalog">
<img src="./images/logo.png" alt="" class="logo"  height="50" width="70"/>
<ul class="menu">
</div>
</div>
</div>
<?php
	echo '<div id="main" class="container">
		<div class="sixteen columns">
		<div class="contactform">
	<div class="six columns"> 
	<h3></h3>
	<p> ';
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$ID = $_SESSION['ID'];
	require('mysql.php');
	if(!empty($_POST['fname'])){
		$name = trim($_POST['fname']);
		$q = "update users set name = '$name' WHERE ID = '$ID' ";
		$r = @mysqli_query($dbc,$q);
		if(!$r)
		{
			echo 'can no update your name!<br />';
		}
	}
	
	if(!empty($_POST['fmail'])){
		$name = trim($_POST['fmail']);
		$q = "update person set XZ = '$name' WHERE ID = '$ID' ";
		$r = @mysqli_query($dbc,$q);
		if(!$r)
		{
			echo 'can no update your constellation!<br />';
		}
	}
	
	if(!empty($_POST['fweb'])){
		$name = trim($_POST['fweb']);
		$q = "update person set wantgo = '$name' WHERE ID = '$ID' ";
		$r = @mysqli_query($dbc,$q);
		if(!$r)
		{
			echo 'can no update the plac that you want to go!<br />';
		}
	}

	if(!empty($_POST['fsub'])){
		$name = trim($_POST['fsub']);
		$q = "update person set going = '$name' WHERE ID = '$ID' ";
		$r = @mysqli_query($dbc,$q);
		if(!$r)
		{
			echo 'can no update the place that you had going to!<br />';
		}	
	}
	
		if(!empty($_POST['ftour'])){
		$name = trim($_POST['ftour']);
		$q = "update person set tour = '$name' WHERE ID = '$ID' ";
		$r = @mysqli_query($dbc,$q);
		if(!$r)
		{
			echo 'can no update the place that you had going to!<br />';
		}	
	}
	
	if(!empty($_POST['fmessage'])){
		$name = trim($_POST['fmessage']);
		$q = "update person set personal = '$name' WHERE ID = '$ID' ";
		$r = @mysqli_query($dbc,$q);
		if(!$r)
		{
			echo 'can no update your introduction!<br />';
		}	
	}
	echo '<strong><h3>Update Success</h3></strong>';
	echo '<p><a href="./index.html" class="buttongreen">back</a></p>';
}
else{
	echo '<strong>please try again!<br/></strong>';
	echo '<p><a href="./change.html" class="buttongreen">back</a></p>';
}
?>
</p>
</div>
</div>
</div>
</div>
<div class="footerstrip">
<div class="container">
<div class="sixteen columns">
觉得网站不错？分享给其他人吧！！！
<script type="text/javascript" src="http://v2.jiathis.com/code/jia.js" charset="utf-8"></script>
<ul class="socials">
<li> share by</li>
<li class="fb"><a class="jiathis_button_tsina"><img src="./images/sina1.png" height="20" width="20" alt="sina" /></a></li>
<li class="vimeo"><a class="jiathis_button_qzone"><img src="./images/QQ.png" height="20" width="20" alt="QQ" /></a></li>
<li class="tw"><a class="jiathis_button_renren"><img src="./images/RR.png" height="20" width="20" alt="renren" /></a></li>
<li class="flickr"><a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank"><img src="./images/flickr.png" alt="flickr" /></a></li>
</ul>

</div>
</div>
</div>
<!-- end funter -->
</body>
</html>