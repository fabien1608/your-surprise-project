<?php
	require('header.php');
	require('models/Model_profil.php');
	$db=ConnectionDb();
	$req=GetProfile($db);
	$commentaries_numbers=GetCommentariesNumbers($db);
	SetNewNickname($db);
	SetNewPassword($db);
	SetNewEmail($db);

	//checking if one ur function is returning one of these numbers (meaning an alert message)
	if(SetNewNickname($db)== 1)
	{
		$result=1;
	}
	elseif (SetNewEmail($db)==2) 
	{

		$result=2;
	}
	elseif (SetNewEmail($db)==3) 
	{
		$result=3;
	}
	elseif(SetNewPassword($db)==4) 
	{
		$result=4;
	}
	elseif(SetNewPassword($db)==5) 
	{
		$result=5;
	}
	else
	{
		$result=0;
	}

	require('views/View_profil.php');