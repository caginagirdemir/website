<?php
require_once("facebook.php");
session_start();
$_SESSION['takipci_id'] = null;
$facebook = new Facebook($fbayar);
$facebook->destroySession();
header("Location:index.php");
?>