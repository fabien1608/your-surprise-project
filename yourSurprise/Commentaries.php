<?php
	require('header.php');
	require ('models/model_Commentaries.php');
	$db=ConnectionDb();
	$req=GetArticles($db);
	$req2=GetCommentaries($db);
	AddCommentarie($db);
	require ('views/View_Commentaries.php');
