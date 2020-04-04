<?php
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

	//this function is returning all of the current user data 
	function GetProfile($db){

		$req=$db->prepare('SELECT * FROM members WHERE id= :id');
		$req->execute(array(
		'id'=> $_SESSION['id']));
		return $req;
		}

	//looking inside the database how many comments have as author the nickname of the current user
	function GetCommentariesNumbers($db){
		$req=$db->prepare('SELECT * FROM comments WHERE id_author=:id_author');
		$req->execute(array(
			'id_author'=>$_SESSION['id']
		));
		//count the number of time that happens and GetCommentariesNumbers return this valor
		$count=$req->rowCount();
		return $count;
	}

	//create a function which checks if the data we put in ($data_send) already exists inside the database.$data_check is where we are checking (for exemple "nickname")
	function CheckIfAlreadyExist($db, $data_check, $data_send){

			$req=$db->prepare('SELECT '.$data_check.' FROM members where '.$data_check.' =:'.$data_check.'');
			$req->execute(array(
			$data_check=>$data_send
			));

			$result=$req->fetch();
			$req->closeCursor();	
			return $result;
	}

	function SetNewNickname($db){
		if(isset($_POST['new_nickname']))
		{
			//Using ur previous function to check if the new nickname is already inside the database
				if(CheckIfAlreadyExist($db, 'nickname', $_POST['new_nickname'])){
					//if the new nickname is already inside the database SetNewNickname return 1
					$error=1;
					return $error;
				}
				else
				{
				//else we are udpdating the database with the new nickname	
				$req=$db->prepare('UPDATE members SET nickname =:nickname WHERE id =:id');
				$req->execute(array(
				'id'=>$_SESSION['id'],
				'nickname'=>$_POST['new_nickname'],
				));
				//switching the $_SESSION['nickname'] with the new one 
				$_SESSION['nickname']=$_POST['new_nickname'];
				//destroying the cookies
				setcookie('nickname', '');
				setcookie('password', '');
				header('Location:Profil.php');
				}
		}
	}

	function SetNewPassword($db){
		if(isset($_POST['new_password']) AND isset($_POST['new_password_confirm']))
		{
			//we are checking if the new_password and the new-password-confirm are matching 
			if($_POST['new_password']==$_POST['new_password_confirm']){

				//we encrypt the new password
				$pass_hache = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

				//we update the data base with the new password
				$req=$db->prepare('UPDATE members SET password=:password WHERE id=:id');
				$req->execute(array(
					'id'=>$_SESSION['id'],
					'password'=>$pass_hache,
				));

				//if it's work fine SetNewPassword return 5 (it's gonna send a success alert)
				$result=5;
				return $result;
				//destroying the cookies
				setcookie('nickname', '');
				setcookie('password', '');
				header('Location:Profil.php');

			}
			else
			{	
				//if ur password and password confirm dont match SetNewPassword return 4
				$error=4;
				return $error;
			}
		}
	}

	function SetNewEmail($db){
		if(isset($_POST['new_email']))
		{
			//we are checking inside the database if the email already exist
			if(CheckIfAlreadyExist($db, 'email', $_POST['new_email'])){

				//if he does we return 3
					$error=3;
					return $error;
			}
			else
			{	
				//if the new_email isn't inside the database we are using a regex to check if the new email is valid
				if((preg_match('#^[a-z][a-z0-9.-_]+@[a-z0-9.-_]{2,}\.[a-z]{2,4}$#',$_POST['new_email'])))
				{
					//if it is we update the database with the new one
					$req=$db->prepare('UPDATE members SET email=:email WHERE id=:id');
					$req->execute(array(
						'id'=>$_SESSION['id'],
						'email'=>$_POST['new_email'],
						));
					header('Location:Profil.php');
				}
				else
				{
					//if the new email isn't valid SetNewEmail return 2
					$error=2;
					return $error;
				}
			}
		}
	}

