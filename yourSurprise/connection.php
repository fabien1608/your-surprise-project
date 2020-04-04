<?php
	require ('models/model_Connection.php');
	$db=ConnectionDb();
	CheckCookies($db);
	SetConnection($db);
	$error=SetConnection($db);
	require('views/View_connection.php');
