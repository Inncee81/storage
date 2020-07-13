<?php
	include_once 'C:\wamp\www\Katoari Website\dbh.inc.php';
	require_once "google.php";
	//$login_button = '';

	if (isset($_GET['code'])) {
		$token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);

		if (!isset($token['error'])) {
			$gClient->setAccessToken($token['access_token']);

			$_SESSION['access_token'] = $token['access_token'];

			$google_service = new Google_Service_Oauth2($gClient);
			$data = $google_service->userinfo->get();

			if (!empty($data['given_name'])) {
				$_SESSION['firstname'] = $data['given_name'];

			}

			if (!empty($data['family_name'])) {
				$_SESSION['lastname'] = $data['family_name'];
			}

			if (!empty($data['email'])) {
				$_SESSION['email'] = $data['email'];
			}

			if (!empty($_SESSION['gender'])) {
				$_SESSION['gender'] = $data['gender'];
			}

			if (!empty($_SESSION['picture'])) {
				$_SESSION['user_image'] = $data['picture'];
			}
		}
		// Generate random characters
		function generateChar($length){
			$chars = "vwyzABC01256";
			$code = "";
			$clean = strlen($chars) - 1;
			while (strlen($code) < $length) {
				$code .= $chars[mt_rand(0, $clean)];
			}
			return $code;
		}
		// Read existing google account
		$email = $_SESSION['email'];
		$query = "SELECT * FROM register where email='$email';";
		function_alert($email);
		$result = mysqli_query($conn, $query);
		if (mysqli_num_rows($result) > 0 ) {
			$row = mysqli_fetch_assoc($result);
		}		
		if ($email == $row['email']) {
				$_SESSION['sess_user'] = $row['user_ID'];
				$_SESSION['google'] = "google";
				header('Location: katoarihome.php');
				exit();
		}
		else{
			$_SESSION['user_image'] = $data['picture'];
			$name = $_SESSION['firstname']. " " . $_SESSION['lastname'];
			$email = $_SESSION['email'];
			$password = generateChar(5);
			$sql = "INSERT INTO register(name, email, password, link) VALUES ('$name', '$email', '$password', '$_SESSION[user_image]')";
			$cond = mysqli_query($conn, $sql);
			$_SESSION['sess_user']=mysqli_insert_id($conn);

			if ($cond) {
				function_alert("Google Account Inserted to database");
				$_SESSION['google'] = "google";
				header('Location: katoarihome.php');
				exit();
			}
			else{
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}



		}

	}

	/*if (!isset($_SESSION['access_token'])) {
		$login_button = '<a href="' .$gClient->createAuthUrl().'"></a>';
		header('Location: katoarihome.php');
		exit();
	}*/
	/*if(isset($_SESSION['access_token']))
		$gClient->setAccessToken($_SESSION['access_token']);
	else if (isset($_GET['code'])){
		$token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
		$_SESSION['access_token'] = $token;
	} else{
		header('Location: katoarihome.php');
		exit();
	}
	$oAuth = new Google_Service_Oauth2($gClient);
	$userData = $oAuth->userinfo_v2_me->get();

	header('Location: katoarihome.php');
	exit();*/

?>
