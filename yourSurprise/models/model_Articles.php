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
        		die('Error : ' . $e->getMessage());
		}
	}

		function GetTotalArticles($db){
			//we select all entries in the database table
			$req=$db->query('SELECT * FROM articles');

			//we return the total of entries
			$count=$req->rowCount();
			return $count;
		}
		

		function GetArticles($db){
			
			//we get the total amout of ur articles in ur database
			$totalArticle=GetTotalArticles($db);

			//we select ur article maximum by page
			$articlesByPage=3;

			//simple math to get ur maximum page
			$maximumPage=ceil($totalArticle/$articlesByPage);

			//checking if we get the current page and if the current page request is in the right data range
			if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page']>1 AND $_GET['page']<= $maximumPage){
				$currentPage=$_GET['page'];
			}
			else
			{	
				//if it not in the right range (or if you dont select any current page (like at the connection)) the curernt page is  by default
				$_GET['page']=1;
				$currentPage=$_GET['page'];
			}

			//we get ur article by page 
			$startPage=($currentPage-1)*($articlesByPage); 
			$req=$db->query('SELECT * FROM articles ORDER  BY  id  DESC  LIMIT '.$startPage.','.$articlesByPage);
			return $req;
		}

		
