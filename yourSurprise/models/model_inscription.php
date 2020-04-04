<?php

//connection to the database	
try
{
	$db = new PDO('mysql:host=localhost;dbname=project;charset=utf8', 'root', '');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}

//create a function which checks if the data we put in ($data_send) already exists inside the database.$data_check is where we are checking (for exemple "nickname")
function CheckIfAlreadyExist($data_check, $data_send){

	$req=$GLOBALS['db']->prepare('SELECT '.$data_check.' FROM members where '.$data_check.' =:'.$data_check.'');
	$req->execute(array(
		$data_check=>$data_send
	));

	$result=$req->fetch();
	$req->closeCursor();
	return $result;
}



function SetInscription(){
	if (isset($_POST['password']) AND isset($_POST['nickname']) AND isset($_POST['passwordC']) AND isset($_POST['email']))
	{
		
		//checking for the nickname with ur previous function
		if (CheckIfAlreadyExist('nickname',$_POST['nickname']))
		{
		//if the nickname is already taken SetInscription() return 1;
			$error=1;
			return $error;
		}

		else
		{
			//Using regex to check if the eamil format is valid 
			if (preg_match('#^[a-z][a-z0-9.-_]+@[a-z0-9.-_]{2,}\.[a-z]{2,4}$#',$_POST['email']))
			{	
				//checking for the email with ur previous function
				if (CheckIfAlreadyExist('email',$_POST['email']))
				{	
				//if the email is already taken SetInscription() return 3;
					$error=3;
					return $error;
				}
				else
				{
					//looking if ur both password (password + password confirmation) have the same entry  
					if($_POST['password']==$_POST['passwordC'])
					{

						//put some hash on the password to encrypt it inside the database
						$pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);

						//preparing and executing ur request to put the new user inside the database
						$req =$GLOBALS['db']->prepare('INSERT INTO members(nickname, password, email, creation_time ) VALUES(:nickname, :password, :email, CURDATE())');
						$req->execute(array(
							'nickname' => $_POST['nickname'],
							'password' => $pass_hache,
							'email' => $_POST['email']
						));
						
						?>
						<!--when the request is done we are moving the user to the connection page -->
						<script type="text/javascript">
							document.location.href="connection.php"
						</script>
						<?php
					}

					else
					{	
						//if the password is not matching with the password confirmation SetInscription() return 3;
						$error=4;
						return $error;
					}
				}

			}
			else
			{	
				//if the format of the email isn't valid SetInscription() return 4;
				$error=2;
				return $error;
			}
		}
	}
}

