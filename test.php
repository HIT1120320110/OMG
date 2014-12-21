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
<li><a href="./index.html">首页</a></li>
<li><a href="./find.html">寻找景点</a></li>
<li><a href="./person.html">个人中心</a>
</li>
<li><a href="./BBS.html">BBS论坛</a></li>
<li><a href="./team.html">我们的团队</a></li>
<li><a href="./contact.html"></a>联系我们</li>
<li><a href="./logout.php">退出</a></li>
</ul>
</div>
</div>
</div>

<div id="main" class="container">
<div class="sixteen columns">
<div class="contactform">
<div class="six columns">
<h3>详细联系方式:</h3>
<p>
欢迎随时联系我们，一起维护属于我的网站:<br /></p>
<p>
<strong>电话号码:&nbsp;</strong>  &nbsp15665402802
<br />
<strong>联系地址:&nbsp;</strong> 哈尔滨工业大学信安一班
<br />
<strong>github:&nbsp;</strong> github.solojoe.com</p>

</div>
</div>
<div id="main" class="container">
<div class="contactform">
<div class="ten columns">

<?php
error_reporting(0);
//引入发送邮件类

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
if($_POST['fsub']==4){
require("smtp.php"); 

//使用163邮箱服务器

$smtpserver = "smtp.163.com";

//163邮箱服务器端口 

$smtpserverport = 25;

//你的163服务器邮箱账号

$smtpusermail = "hitsolojoe@163.com";

//收件人邮箱

$smtpemailto = "924389934@qq.com";

//你的邮箱账号(去掉@163.com)

$smtpuser = "hitsolojoe@163.com";//SMTP服务器的用户帐号 

//你的邮箱密码

$smtppass = "19941017"; //SMTP服务器的用户密码 

//邮件主题 
$a = "-";
$mailsubject = $_POST['fname'].$a.$_POST['fmail'];

//邮件内容 

$mailbody = $_POST['fmessage'];

//邮件格式（HTML/TXT）,TXT为文本邮件 

$mailtype = "TXT";

//这里面的一个true是表示使用身份验证,否则不使用身份验证. 

$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);

//是否显示发送的调试信息 

$smtp->debug = TRUE;

//发送邮件

$smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);
echo'<div class="pad">
<h3>
发送成功	
</h3>';

}
else{
	echo'<div class="pad">
<h3>
发送失败	
</h3>';
}
}
?>
</div>
</div>
</div>
</div>
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

<!-- end funter -->
</body>
</html>