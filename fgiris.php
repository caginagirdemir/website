<?php
require_once("ayar.php");
require_once("facebook.php");

$facebook = new Facebook($fbayar);
// giri� yap�lmam��sa buras�
$girisurl = $facebook->getLoginUrl(array(
     'scope' => 'publish_stream,email',
     'redirect_uri' => 'http://www.caginagirdemir.com/fgirisp.php'
));
     header("Location: $girisurl");
?>