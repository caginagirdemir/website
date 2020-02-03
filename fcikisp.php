<?php
	require_once("ayar.php");
require_once("facebook.php");

$facebook = new Facebook($fbayar);

unset($_SESSION['fboturum']);
unset($_SESSION['fboturumid']);

$facebook->destroySession();

header("Location: index2.php")
?>