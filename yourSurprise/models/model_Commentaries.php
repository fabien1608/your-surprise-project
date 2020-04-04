<?php

		function ConnectionDb()
		{
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

		//We get the article from this id (using the $_GET['id'])
		function GetArticles($db)
		{
			if (isset($_GET['id']))
			{
				$req=$db->prepare('SELECT * FROM articles WHERE id = :id');
				$req->execute(array('id'=>$_GET['id']));
				return $req;
			}
		}

		//we get all the comments associate with this aricle
		function GetCommentaries($db)
		{

			$req=$db->prepare('SELECT * FROM comments WHERE id_article = :id_article');
			$req->execute(array('id_article'=> $_GET['id']));
			return $req;
		}


		function AddCommentarie($db){

			if (isset($_POST['comment']))
			{	
				//we insert into the database a new comment that's gonna use the current nickname user's as author
				$req=$db->prepare('INSERT INTO comments(id_article, id_author, author, comment, comment_date)
					VALUES (:id_article,:id_author,:author,:comment,NOW())');
				$req->execute(array(
					'id_article'=>$_GET['id'],
					'id_author'=>$_SESSION['id'],
					'author'=>$_SESSION["nickname"],
					'comment'=>$_POST['comment'],
					));
				
				//When the database is update we are reloading the page
				header('Location:Commentaries.php?id='.$_GET['id'].'');
			}
		}