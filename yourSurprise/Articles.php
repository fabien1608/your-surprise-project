<?php	
	require('header.php');
	require ('models/model_Articles.php');
	$db=ConnectionDb();
	$req=GetArticles($db);
	$Totalarticles=GetTotalArticles($db);
	$TotalPages=ceil($Totalarticles/3);
	require('views/View_Articles.php');