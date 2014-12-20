<?php
	session_start();
	if(!isset($_SESSION['manageID']))
	{
		require('loginfunction2.php');
		redirect_user('manage.html');
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

                <script type="text/javascript" src="./js/jquery.1.70.js"></script>
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
<li><a href="./ManagePoint.html">首页</a></li>
<li><a href="./logout1.php">退出</a></li>
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
	$errors = array();
	if(empty($_POST['fname'])){
		$errors[] = 'you forget to input name!';
	}else{
		$name = trim($_POST['fname']);
	}
	
	if(empty($_POST['fmail'])){
		$errors[] = 'you forget to input action';
	}else{
		$action = trim($_POST['fmail']);
	}
	
	if(empty($_POST['fweb'])){
		$errors[] = 'you forget to input commander!';
	}else{
		$author = trim($_POST['fweb']);
	}
	
	if(!empty($_POST['fmessage'])){
		$message = trim($_POST['fmessage']);
	}
	else{ $message= "";}

	if(empty($errors)){
		require('mysql.php');
		$q = "insert into placed values ( '$name', '$action', '$author', '1')";
		$r = @mysqli_query($dbc, $q);
		if($r)
		{
			$date = date("YmdHms");
			$img = "./images/h6.png";
			$love = './txt/'.$date.'.txt';
			$file = fopen("$love","a");
			fwrite($file,$message);
			fclose($file);
			$lx = './txt/'.$date.'lx.txt';
			$file = fopen("$lx","a");
			fwrite($file,"\n");
			fclose($file);
			$PJ = './txt/'.$date.'PJ.txt';
			$file = fopen("$PJ","a");
			fwrite($file,"\n");
			fclose($file);
			$q1 = "insert into place values ('$name', '$img', '$love',2, '$lx', '$PJ')";
			$r1 = @mysqli_query($dbc,$q1);
			$date = date("Hms");
			$txt = './txt/'.$date.'love.txt';
			$file = fopen("$txt","a");
			fwrite($file,"/r\n");
			fclose($file);
			$q = "insert into placelove values('$name','$txt')";
			$r = @mysqli_query($dbc,$q);
			echo '<p><a href="./makepic.html?name='.$name.'" class="buttongreen">插入图片</a></p>';
		}
		else{
			echo '<strong>i am sorry that is  a system error<br/></strong>';
			echo '<p><a href="./ManagePoint.html" class="buttongreen">back</a></p>';
		}
		mysqli_close($dbc);
		exit();
	}
	else{
		foreach($errors as $mes)
		{
		echo "<strong>-$mes<br /></strong>";
		}
		echo '<p><a href="./ManagePoint.html" class="buttongreen">back</a></p>';
	}
}
else{
	echo '<strong>please try again!<br/></strong>';
	echo '<p><a href="./ManagePoint.html" class="buttongreen">back</a></p>';
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