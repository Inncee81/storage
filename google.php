<?php
	session_start();
	require_once("GoogleAPI/vendor/autoload.php");
	$gClient = new Google_Client();
	$gClient->setClientId("1000619958746-03npdu3h2bpae53ip8c0nrgtik0iq075.apps.googleusercontent.com");
	$gClient->setClientSecret("2FgsnnA-mGeV5nCMgPNDrDI0");
	$gClient->setApplicationName("Katoari");
	$gClient->setRedirectUri("http://localhost/Katoari%20Website/katoariconfig.php");
	$gClient->addScope("email");
	$gClient->addScope("profile");

	 $loginURL = $gClient->createAuthUrl();
?>