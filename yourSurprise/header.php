<?php	
session_start();
if(isset($_SESSION["nickname"])==false)
{
	header("Location: connection.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8" />
	<title>Project</title>
	<!--css --> 
	<link rel="stylesheet" href="css/style2.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery-3.4.1.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<header>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-center">
		<ul  class="f-w navbar-nav row">
	<!--		
			preparation for more contents

			<li class="nav-item col-md text-center"  >
				<a class="nav-link" href="Articles.php">Articles</a>
			</li>
			<li class="nav-item col-md text-center" >
				<a class="nav-link" href="#">#</a>
			</li>
			<li class="nav-item col-md text-center" >
				<a class="nav-link" href="#">#</a>
			</li>
		-->
			<li class="nav-item dropdown col-md text-right">
				<!-- Getting the nickname of the user thanks to the session and create a dropdown menu-->
				<a class="nav-link dropdown-toggle" data-toggle="dropdown"><?= htmlspecialchars($_SESSION["nickname"]) ?></a>
				<div class="dropdown-menu dropdown-menu-right">
					<a class="dropdown-item" href="Profil.php">Profile</a>
					<a class="dropdown-item" href="deconnection.php">deconnection</a>
				</div>
			</li>
		</ul>
	</nav>
</header>




