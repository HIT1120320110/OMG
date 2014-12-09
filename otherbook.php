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
	<title>目的地</title>
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
	<!-- Favicons
	================================================== -->

        <script type="text/javascript" src="./js/jquery.1.70.js"></script>
        <script type="text/javascript" src="./js/jquery.eislideshow.js"></script>
        <script type="text/javascript" src="./js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="./js/jquery.tweet.js"></script>		
        <script type="text/javascript" src="./js/custom.js"></script>
		<script type="text/javascript" src="./js/my.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>
<div class="header">
<div class="container">
<div class="Catalog">
<img src="./images/logo.png" alt="" class="logo"  height="50" width="70"/>
<ul class="menu">
<li><a href="./index.html">首页</a></li>
<li><a href="./find.html">寻找景点</a></li>
<li><a href="./person.html">个人中心</a>
<li><a href="./BBS.html">BBS论坛</a></li>
<li><a href="./team.html">我们的团队</a></li>
<li><a href="./contact.html">联系我们</a></li>
<li><a href="./logout.php">退出</a></li>
</ul>
</div>
</div>
</div>
<!-- end of header -->
<div id="main" class="container">
<?php
	$path = './txt/tour/'.$IE.'/'.$titlename.'.txt';
	echo'
	<div><h1>';
	echo $titlename;
	echo'<br/><h1></div>';
	echo'
	<div style=" font-size:18px; color:#000">&nbsp&nbsp作者:';
	require('mysql.php');
	$q = "SELECT * FROM users WHERE ID = '$IE'";
	$r = @mysqli_query($dbc,$q);
	if($r){
		$row = mysqli_fetch_array($r,MYSQLI_ASSOC);
		$name = $row['name'];
	}
	echo $name;
	echo'<br /></div>';
	
	echo '<div class="whos">';

	echo' </div>
	<div class="excerpt2" style=" font-size:14px; color:#000"> <br/>';
	$file = file($path);
	foreach($file as $value)
	{
		echo $value;
		echo '<br/>';
	}
	echo '
	</div>
	';
?>
</div>
<!-- end of main home -->
<div class="footerstrip">
<div class="container">
<div class="sixteen columns">
觉得网站不错？分享给其他人吧！！！
<ul class="socials">
<li> share by</li>
<li class="fb"><a href="#"><img src="./images/sina1.png" height="20" width="20" alt="sina" /></a></li>
<li class="vimeo"><a href="#"><img src="./images/QQ.png" height="20" width="20" alt="QQ" /></a></li>
<li class="tw"><a href="#"><img src="./images/RR.png" height="20" width="20" alt="renren" /></a></li>
<li class="flickr"><a href="#"><img src="./images/flickr.png" alt="flickr" /></a></li>
</ul>
</div>
</div>
</div>
<!-- end funter -->
</body>
</html>