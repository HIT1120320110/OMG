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
<li><a href="./person.html">个人中心</a></li>
<li><a href="./BBS.html">BBS论坛</a></li>
<li><a href="./team.html">我们的团队</li>
<li><a href="./contact.html">联系我们</a></li>
<li><a href="./logout.php">退出</a></li>
</ul>
</div>
</div>
</div>
<!-- end of header -->
<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$_SESSION['s0'] = $_POST['sinput'];
		$pos = $_POST['IE'];
	}
		$s = $_SESSION['s0'];
		require('mysql.php');
		$q = "SELECT * FROM place WHERE name = '$s'";
		$r = @mysqli_query($dbc,$q);
		if($r){
		$row = mysqli_fetch_array($r,MYSQLI_ASSOC);
?>
<div id="main" class="container">
<div class="eleven columns">

<div class="blogpost">
<a href="#" class="featuredimg">
<?php
	$key = $row['img'];
	echo "<img src='$key'>";
?></a>
<div class="excerpt">
<h3><a href="#">美景介绍:&nbsp&nbsp</a></h3>
<div class="whos">
<div><span>地理位置:&nbsp;</span> 卡尼岛</div>
<div><span>推荐人:&nbsp;</span> <a href="#">JR Smith</a></div>
<br/>
<br/>
<div><span></span> <a  class="buttongreen" href="find.html"><h4>返回</h4></a></div>
</div>
<div class="excerpt2">
<strong>
&nbsp&nbsp<?php
	$s1 = $row['txt'];
	$file =file( "$s1" );
	foreach($file as $value)
	{
		echo $value;
	}
?>
</strong>
</div>
</div>

</div>
</div>

<div class="five columns sidebarhome aspages">
<div class="sidinside">

<div class="widget">
<div class="h4"><h4>路线攻略</h4></div>
<div class="clear"></div>
<strong>
<?php
	$s2 = $row['lx'];
	if($pos == 2){
	if($_POST['fmessage'] != ""){
	$open=fopen("$s2","a" );
	fwrite($open,"\r\n");
	fwrite($open,$_POST['fmessage']);
	fwrite($open,"\r\r\r\r by--");
	fwrite($open,$_SESSION['name']);
	fclose($open);
	}
	}
	$file =file( "$s2" );
	foreach($file as $value)
	{
		echo $value;
		echo '</br>';
	}
?>
</strong>
</div>
<div class="widget">
<div class="h4bg"><h4>美景评价</h4></div>
<div class="clear"></div>
<strong>
<?php
	$s3 = $row['PJ'];
	if($pos == 1){
	if($_POST['fmessage'] != ""){
	$open=fopen("$s3","a" );
	fwrite($open,"\r\n");
	fwrite($open,$_POST['fmessage']);
	fwrite($open,"\r\r by--");
	fwrite($open,$_SESSION['name']);
	fclose($open);
	}
	}
	$file =file( "$s3" );
	foreach($file as $value)
	{
		echo $value;
		echo '</br>';
	}
?>
</strong>
</div>


</div>

</div>
<label>您的评价</label>
<form action="find.php" method="post" id="advice">
<textarea id="fmessage" name="fmessage"></textarea>
<?php
echo '<input type="hidden" name="sinput" value="'.$s.'">';
echo '<input type="hidden" name="IE" value="1">';
?>
<input type="submit" class="buttongreen" id="fsubmit" name="fsubmit" value="提交评价" />
</form>
<label>您的路线建议</label>
<form action="find.php" method="post" id="advice1">
<textarea id="fmessage" name="fmessage"></textarea>
<?php
echo '<input type="hidden" name="sinput" value="'.$s.'">';
echo '<input type="hidden" name="IE" value="2">';
?>
<input type="submit" class="buttongreen" id="fsubmit" name="fsubmit" value="提交路线" />
</form>
</div>
</div>

</div>

<?php
	}
?>
</body>
</html>