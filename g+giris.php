<?php

########## Google Settings.. Client ID, Client Secret #############
$google_client_id 		= '97207115188-fc5mcvvq4lh8aavaap785lfsujlb241f.apps.googleusercontent.com';
$google_client_secret 	= 'SNHIz2xSIU_cCHfPzRvMJNEk';
$google_redirect_url 	= 'http://www.caginagirdemir.com/index2.php';
$google_developer_key 	= 'AIzaSyB4wMhseFKavjL-U0mjJC56SDCpCa2S25s';

########## MySql details (Replace with yours) #############
$db_username = "cagin_1"; //Database Username
$db_password = "123456"; //Database Password
$hostname = "94.73.144.226"; //Mysql Hostname
$db_name = 'cagin_1'; //Database Name
###################################################################

//include google api files
require_once 'src/Google_Client.php';
require_once 'src/contrib/Google_Oauth2Service.php';

//start session
session_start();

$gClient = new Google_Client();
$gClient->setApplicationName('caginagirdemir.com');
$gClient->setClientId($google_client_id);
$gClient->setClientSecret($google_client_secret);
$gClient->setRedirectUri($google_redirect_url);
$gClient->setDeveloperKey($google_developer_key);

$google_oauthV2 = new Google_Oauth2Service($gClient);

//If user wish to log out, we just unset Session variable
if (isset($_REQUEST['reset'])) 
{
  unset($_SESSION['token']);
  $gClient->revokeToken();
  header('Location: ' . filter_var($google_redirect_url, FILTER_SANITIZE_URL));
}

//Redirect user to google authentication page for code, if code is empty.
//Code is required to aquire Access Token from google
//Once we have access token, assign token to session variable
//and we can redirect user back to page and login.
if (isset($_GET['code'])) 
{ 
	$gClient->authenticate($_GET['code']);
	$_SESSION['token'] = $gClient->getAccessToken();
	header('Location: ' . filter_var($google_redirect_url, FILTER_SANITIZE_URL));
	return;
}


if (isset($_SESSION['token'])) 
{ 
		$gClient->setAccessToken($_SESSION['token']);
}


if ($gClient->getAccessToken()) 
{
	  //Get user details if user is logged in
	  $user 				= $google_oauthV2->userinfo->get();
	  $user_id 				= $user['id'];
	  $user_name 			= filter_var($user['name'], FILTER_SANITIZE_SPECIAL_CHARS);
	  $email 				= filter_var($user['email'], FILTER_SANITIZE_EMAIL);
	  $profile_url 			= filter_var($user['link'], FILTER_VALIDATE_URL);
	  $profil_image_url 	= filter_var($user['picture'], FILTER_VALIDATE_URL);
	  $personMarkup 		= "$email<div><img src='$profile_image_url?sz=50'></div>";
	  $_SESSION['token'] 	= $gClient->getAccessToken();
}
else 
{

$authUrl = $gClient->createAuthUrl();
}
        $Ara 	= array(
               "Ä±",
               "Ä°",
               "Ã¼",
               "Ãœ",
               "ÅŸ",
               "Åž",
               "Ã–",
               "Ã¶",
               "Ã‡",
               "Ã§",
               "Äž",
               "ÄŸ"
               ); 
   $Degis 	= array(
               "ý",
               "Ý",
               "ü",
               "Ü",
               "þ",
               "Þ",
               "Ö",
               "ö",
               "Ç",
               "ç",
               "Ð",
               "ð"
               ); 


     $tamisim =  str_ireplace($Ara, $Degis, $user_name);
     
     	//get google login url
    $connecDB = mysql_connect($hostname, $db_username, $db_password)or die("Unable to connect to MySQL");
    mysql_select_db($db_name,$connecDB);
	
    //compare user id in our database
    mysql_query ("SET NAMES 'latin5'");
    mysql_query ("SET  CHARACTER SET 'latin5'");
    mysql_query ("SET COLLATION_CONNECTION = 'latin5_turkish_ci'");
    $result = mysql_query("SELECT COUNT(takipci_id) FROM takipci WHERE takipci_ad='$tamisim'");
    $result2 = mysql_query("SELECT * FROM takipci WHERE takipci_ad='$tamisim'");
	if($result === false) { 
		die(mysql_error()); //result is false show db error and exit.
	}
	
	$UserCount = mysql_fetch_array($result);
    $UserCount2 = mysql_fetch_array($result2);
 
    if($UserCount[0]) //user id exist in database
    {
		echo 'Welcome back '.$user_name.'!';
        $_SESSION['tamisim']= $tamisim;
        $_SESSION['mail']= $mail;
        $_SESSION['takipci_id']= $UserCount2['takipci_id'];
        header("Location:index.php#");     
    }else{ //user is new
		echo 'Hi '.$user_name.', Thanks for Registering!';
		@mysql_query("INSERT INTO takipci (takipci_ad,takipci_mail) VALUES ('$tamisim','$email')");
        $_SESSION['tamisim']= $tamisim;
        $_SESSION['mail']= $mail;
        $result3= mysql_query("SELECT * FROM takipci WHERE takipci_ad='$tamisim'");
        $UserCount3 = mysql_fetch_array($result3);
        $_SESSION['takipci_id']= $UserCount3['takipci_id'];
        header("Location:index.php#");     
	}
	
	//list all user details
	echo '<pre>'; 
	print_r($user);
	echo '</pre>';	
 
?>

