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
<li><a href="./BBS.html">在线组团</a></li>
<li><a href="./team.html">我的消息</a></li>
<li><a href="./contact.html">联系我们</a></li>
<li><a href="./logout.php">退出</a></li>
</ul>
</div>
</div>
</div>
<!-- end of header -->
<div id="main" class="container">
<div class="eleven columns">
<?php
	require('mysql.php');
	$q = "SELECT * FROM thread WHERE threadname = '$teamname'";
	$r = @mysqli_query($dbc,$q);
	if($r){
		$row = mysqli_fetch_array($r,MYSQLI_ASSOC);
		$userid = $row['userid'];
		$a = $row['place'];
		$b = $row['price'];
		$number = $row['number'];
		$message = $row['message'];
	}
	$q = "SELECT * FROM ThreadL WHERE threadname = '$teamname'";
	$r = @mysqli_query($dbc,$q);
	$row = mysqli_fetch_array($r,MYSQLI_ASSOC);
	$name = $row['person'];
	$fuck = $name;
	$reply = $row['reply'];
	$file = file($name);
	$i=0;
	foreach($file as $value)
		{
			$value = trim($value);
			if($value == $ID)
			{
				$i = $i+1;
				break;
			}
		}
	echo'
	<div><h1>';
	echo $teamname;
	echo'<br/><h1></div>';
	echo'
	<div style=" font-size:18px; color:#000">楼主:';
	$q = "SELECT * FROM users WHERE ID = '$userid'";
	$r = @mysqli_query($dbc,$q);
	if($r){
		$row = mysqli_fetch_array($r,MYSQLI_ASSOC);
		$name = $row['name'];
	}
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$fmessage = $_POST['fmessage'];
		$date = $_POST['xx'];
		$file = fopen("$reply","a");
		fwrite($file,$name);
		fwrite($file,"\r\n");
		fwrite($file,$date);
		fwrite($file,"\r\n");
		fwrite($file,$fmessage);
		fwrite($file,"\r\n");
	}
	echo $name;
	echo'<br/></div>
	<div style=" font-size:18px; color:#000">目的地:'.$a.'<br /></div>
	<div style=" font-size:18px; color:#000">招募人数:'.$number.'<br /></div>
	<div style=" font-size:18px; color:#000">价格区间:'.$b.'<br /></div>
	<div class="excerpt2" style=" font-size:18px; color:#000"> <br/>'.$message.'<br/>';
	$file = file($reply);
	$aa = array();
	$j=0;
	foreach($file as $value)
	{
			$aa[] = $value ;
			$j =$j+1;
	}
	for($k=0;$k<$j/3;$k=$k+1)
	{
		$m = $k*3;
		echo '<div><span>&nbsp</span></div>';
		echo '<div><span>层主:'.$aa[$m].'</span></div>';
		echo '<div><span>回复时间:'.$aa[$m+1].'</span></div>';
		echo '<div><span>回复内容:'.$aa[$m+2].'</span></div><br/><br/>';
		echo '<div><span>&nbsp</span></div>';
		echo '<div><span>&nbsp</span></div>';
	}
	if($i==1)
	{
		$date = date('Y-m-d H:m:s');
		echo '回复：<form method="post" action="changeteam.php?teamname='.$teamname.'">
			<textarea id="fmessage" name="fmessage" style="width: 300px; height: 100px; background-color:#FFFFFF; font-size:18px; color:#000"></textarea>
			<input type="hidden" name="xx" value="'.$date.'">
			<input type="submit" class="buttongreen" value="提交">
			</form>';
	}
	echo '</div>
		</div>
		<div class="five columns sidebarhome aspages">
		<div class="sidinside">
		<div class="widget">
		<div class="clear"></div>
		</div>';
	if($i==0){	
	echo'<div class="widget">
		<a href="#"><h3>申请加入<h3></a>
		<div class="clear"></div>
		</div>';
	}
		echo'<div class="widget">
		<a href="#"><h3>团队人员<h3></a>';
		$file = file($fuck);
		foreach($file as $value)
		{
			$q = "SELECT * FROM users WHERE ID = '$value'";
			$r = @mysqli_query($dbc,$q);
			if($r){
				$row = mysqli_fetch_array($r,MYSQLI_ASSOC);
				$name = $row['name'];
			}
			echo '<div><span>'.$name.'</span></div>';
		}
		echo '<div class="clear"></div>
		</div>';

?>
</div>

</div>
</div>
<!-- end of main home -->
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