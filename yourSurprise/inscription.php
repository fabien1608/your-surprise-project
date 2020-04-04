<?php
	require ('models/model_inscription.php'); 
	SetInscription();
	// if SetInscprition() is returning an integer $error=this integer
	if (is_int(SetInscription()))
	{
		$error=SetInscription();
	}
	else
	{	
	//if SetInscription isn't returning an integer we put $error=0 (it's not gonna trigger any alertmessage from ur view)
		$error=0;
	}
	require('views/View_Inscription.php');