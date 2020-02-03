<?php
	

$link = mysql_connect("94.73.144.226","cagin_1","123456") or die(mysqlerror());
$db = mysql_select_db("cagin_1",$link) or die(mysqlerror());

$fbayar = array();
$fbayar['appId']="625904840778257";
$fbayar['secret']="d8910d75d3a087f1fb2b168cec6b5989";
?>