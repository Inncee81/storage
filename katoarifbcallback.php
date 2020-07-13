<?php
	include_once 'C:\wamp\www\Katoari Website\dbh.inc.php';
	require_once("katoarifbconfig.php");

	try{
		$accessToken = $handler->getAccessToken();
	}catch(\Facebook\Exceptions\FacebookResponseException $e){
		echo "Response Exception: " . $e->getMessage();
		exit();
	}catch(\Facebook\Exceptions\FacebookSDKException $e){
		echo "SDK Exception: " . $e->getMessage();
		exit();
	}

	if (!$accessToken) {
		header('Location: katoari.php');
		exit();
	}

	$oAuth2Client = $fb->getOAuth2Client();
	if (!$accessToken->isLongLived()) {
		$accessToken  = $oAuth2Client->getLongLivedAccesToken($accessToken);

		$response = $fb->get("/me?fields=id, first_name, last_name, email, picture.type(large)", $accessToken);
		$userData = $response->getGraphNode()->asArray();
		$_SESSION['userData'] = $userData;
		$_SESSION['access_token'] = (string) $access_token;
		header('Location: katoarihome.php');
		exit();
	}
?>