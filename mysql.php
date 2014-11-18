
<?php
	DEFINE('DB_HOST',"localhost");
	DEFINE('DB_USER',"root");
	DEFINE('DB_PASSWORD',"19941017");
	DEFINE('DB_NAME',"ly");
	$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	mysqli_set_charset($dbc,'utf8');
	if(!$dbc){
	 die('fail to connection !'.mysql_error());
	}
?>