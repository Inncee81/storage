<?php

include_once 'C:\wamp\www\Katoari Website\dbh.inc.php';
require_once('Facebook/autoload.php');
$fb = new \Facebook\Facebook([
	'app_id' => '1157995747902704',
	'app_secret' => '783c9c23ee08217da533d079db609a19',
	'default_graph_version' => 'v2.10',
]);

$handler = $fb -> getRedirectLoginHelper();
//$_SESSION['FBRLH_state']=$_GET['state'];


?>