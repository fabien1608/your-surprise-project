<?php
	//moving the user on the main page
	header('Location: Articles.php');
	session_start();
	//creation of the cookies for one years
	if(isset($_SESSION["cookie"]))
	{	
		setcookie('nickname',$_SESSION['nickname'], time() + 365*24*3600, null, null, false, true); 
		setcookie('password',$_SESSION['password'], time() + 365*24*3600, null, null, false, true); 
	}
