
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
<li><a href="./login.html">login</a></li>
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
		$errors[] = 'you forget to input your name!';
	}else{
		$name = trim($_POST['fname']);
	}
	
	if(empty($_POST['fnima'])){
		$errors[] = 'you forget to iuput you password';
	}else{
		$a = trim($_POST['fnima']);
		$b = trim($_POST['fnimat']);
		if($a != $b){
			$errors[] = 'you password did not match the confirmed password!';
		} else{
			$nima = $a;
		}
	}
	
	if(empty($_POST['fmail'])){
		$errors[] = 'you forget to input your email!';
	}else{
		$email = trim($_POST['fmail']);
	}
	
	if(!empty($_POST['fage'])){
		$age = trim($_POST['fage']);
	}
	else{ $age= '0';}
	if(!empty($_POST['fsex'])){
		$sex = trim($_POST['fsex']);
	}
	else{ $sex = '0';}
	if(!empty($_POST['fsch'])){
		$school = $_POST['fsch'];
	}
	else{ $shcool='0';}
	if(!empty($_POST['fphone'])){
		$phone = $_POST['fphone'];
	}
	else{ $phone ='0';}

	if(empty($errors)){
		require('mysql.php');
		$q = "insert into users (name, password, email, age, school, phone, sex) values ( '$name', '$nima', '$email', '$age', '$school', '$phone', '$sex')";
		$r = @mysqli_query($dbc, $q);
		if($r)
		{
			$q = "select * from users where name = '$name'";
			$r = @mysqli_query($dbc, $q);
			$row = mysqli_fetch_array($r,MYSQLI_ASSOC);
			$ID = $row['ID'];
			$q = "insert into person values('$ID','暂无','暂无','暂无','暂无','暂无')";
			$r = @mysqli_query($dbc,$q);
			$img = "./images/h6.png";
			$love = './txt/'.$ID.'-love'.'.txt';
			$lovespace = './txt/'.$ID.'-loveplace'.'.txt';
			$tour = './txt/tour/'.$ID.'/my'.'.txt';
			$file = fopen("$love","a");
			fwrite($file,"/\r\n");
			fclose($file);
			$file = fopen("$lovespace","a");
			fwrite($file,"/\r\n");
			fclose($file);
			$q = "insert into PI values('$ID','$love','$img','$lovespace')";
			$r = @mysqli_query($dbc,$q);
			echo '<strong>you are now registered<br/></strong>';
			echo '<p><a href="./login.html" class="buttongreen">login</a></p>';
		}
		else{
			echo '<strong>i am sorry that is  a system error<br/></strong>';
			echo '<p><a href="./page.html" class="buttongreen">back</a></p>';
		}
		mysqli_close($dbc);
		exit();
	}
	else{
		foreach($errors as $mes)
		{
		echo "<strong>-$mes<br /></strong>";
		}
		echo '<p><a href="./page.html" class="buttongreen">back</a></p>';
	}
}
else{
	echo '<strong>please try again!<br/></strong>';
	echo '<p><a href="./page.html" class="buttongreen">back</a></p>';
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
share to others
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