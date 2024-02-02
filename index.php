<?php
session_start();
require_once "functions.php";


$p= $_GET['p'] ?? "";

if($_SERVER["REQUEST_METHOD"] === "POST"){
	$action= $_POST['action'] ?? "";
	switch ($action){
		case 'signup':
			$message=addUser();
			break;
		case 'login':
			$message=logUser();
			$p="home";
			break;
		case 'forgot':
			$message=waitReset();
			$p="home";
			break;
		case 'reset':
			$message=resetPwd();
			$p="signup";
	}
}

if ($p=='activation')
		$message=activUser();
if ($p=='deconnect'){
	session_unset();
	session_destroy();
	$message=array("success", "Vous êtes déconnecté");
}
if ($p=='reset' && !isset($_GET['t'])){
	$message=array("error", "Lien invalide. Veuillez réessayer");
	$p="forgot";
}

$logged = $_SESSION['is_login'] ?? false;

include "header.php";
switch ($p) {
	case 'forgot':
		include "forgot.php";	
		break;	
	case 'reset':
		$token=htmlspecialchars($_GET['t']);
		include "reset.php";	
		break;	
	case 'signup':
		include "signup.php";	
		break;
	default:
		include "home.php";	
}
include "footer.php";