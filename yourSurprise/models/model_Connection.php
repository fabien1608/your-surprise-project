<?php

	//connection with the database
function ConnectionDb(){
	try
	{
		$db = new PDO('mysql:host=localhost;dbname=project;charset=utf8', 'root', '');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $db;
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
}

	//we are looking if somes cookies are register
function CheckCookies($db){
	if(isset($_COOKIE['password']) AND isset($_COOKIE['nickname']))
	{	
		$req=$db->prepare('SELECT id, password FROM members WHERE nickname = :nickname');
		$req->execute(array(
			'nickname'=> $_COOKIE['nickname']));
		$result=$req->fetch();

		$passwordIsCorrect=($_COOKIE['password']=$result['password']);

	//if we have cookies and they are matching with some results inside the database (user exist and the password is matching) the user is loging on the website and the session is starting
		if ($result AND $passwordIsCorrect)
		{
			session_start();
			$_SESSION['id'] = $result['id'];
			$_SESSION['nickname'] = $_COOKIE['nickname'];
			?>
			<script type="text/javascript">
				document.location.href="Articles.php";
			</script>
			<?php
		}
	}
}

function SetConnection($db){
	if (isset($_POST['password']) AND isset($_POST['nickname']))
	{
		//we are looking if the user nickname is inside the database
		$req=$db->prepare('SELECT id, password FROM members WHERE nickname = :nickname');
		$req->execute(array(
			'nickname'=> $_POST['nickname']));
		$result=$req->fetch();

		//checking if the password that the user put in the request is matching with the one in the database(using password_verify to encrypt the password in the same way that the one in the db, so we can compare the both)
		$passwordIsCorrect=password_verify($_POST['password'], $result['password']);
		if (!$result)
		{
			// if the password isn't matching SetConnection return 1;
			$error=1;
			return $error;

		}

		//looking if the password is correct and if the user want to be log automaticaly next time
		elseif($passwordIsCorrect AND isset($_POST['autoC']))
		{
			//starting the session and create some session variables
			session_start();
			$_SESSION['id'] = $result['id'];
			$_SESSION['nickname'] = $_POST['nickname'];
			$_SESSION['password'] = $result['password'];
			$_SESSION['cookie'] = true;

			//moving the user on activate.coockies.php (wich is gonna create somes cookies)
			?>
			<script type="text/javascript">
				document.location.href="Activate_Cookies.php";
			</script>
			<?php
		}
		elseif($passwordIsCorrect)
		{
			session_start();
			$_SESSION['id'] = $result['id'];
			$_SESSION['nickname'] = $_POST['nickname'];
			echo "success";
			?>
			<script type="text/javascript">
				document.location.href="Articles.php";
			</script>
			<?php
		}
		else
		{
		//else SetConnection return 1 (the nickname isn't in the database)
		$error=1;
		return $error;
	}

}
}