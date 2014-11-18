<?php
	function check_login($dbc,$name='',$password='')
	{
		$errors = array();
		if(empty($name)){
			$errors[] = 'you forget to input your ID';
		}else{
			$e = mysqli_real_escape_string($dbc,trim($name));
		}
		if(empty($password)){
			$errors[] = 'you forget to input your password';
		}else{
			$p = mysqli_real_escape_string($dbc,trim($password));
		}
		
		if(empty($errors)){
			$q = "SELECT ID, name FROM users where name= '$e' AND password = '$p'";
			$r = mysqli_query($dbc, $q);
			if(mysqli_num_rows($r) == 1)
			{
				$row = mysqli_fetch_array($r,MYSQLI_ASSOC);
				return	array(ture, $row);
			}else{
				$errors[] = 'your name OR password did not match!';
			}
		}
		return array(false,$errors);
		
	}
	
	function  redirect_user($page = 'index.html'){
		$url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
		$url = rtrim($url, '/\\');
		$url .= '/'.$page;
		header("location:$url");
		exit();
	}
?>