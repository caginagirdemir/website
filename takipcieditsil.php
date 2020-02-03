<?php
$link = mysql_connect("94.73.144.226","cagin_1","123456") or die(mysqlerror());
$db = mysql_select_db("cagin_1",$link) or die(mysqlerror());
$sorgusil = "delete from takipci where takipci_id=".$_GET['id'];
mysql_query($sorgusil);
header("Location:takipciedit.php");
?>