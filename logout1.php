<?php
	session_start();
	if(isset($_SESSION['manageID']))
	{
		$_SESSION = array();
		session_destroy();
		setcookie('PHPSESSID','',time()-3600,'',0,0);
	}
	require('loginfunction2.php');
	redirect_user('manage.html');
?>