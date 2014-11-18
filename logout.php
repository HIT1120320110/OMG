<?php
	session_start();
	if(isset($_SESSION['ID']))
	{
		$_SESSION = array();
		session_destroy();
		setcookie('PHPSESSID','',time()-3600,'',0,0);
	}
	require('loginfunction.php');
	redirect_user('login.html');
?>