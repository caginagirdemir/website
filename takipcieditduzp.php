<?php
$link = mysql_connect("94.73.144.226","cagin_1","123456") or die(mysqlerror());
$db = mysql_select_db("cagin_1",$link) or die(mysqlerror());
mysql_query ("SET NAMES 'latin5'");
mysql_query ("SET  CHARACTER SET 'latin5'");
mysql_query ("SET COLLATION_CONNECTION = 'latin5_turkish_ci'");
$takipci_id = $_POST['takipci_id'];
$takipci_ad = $_POST['takipci_ad'];
$takipci_gercek_ad = $_POST['takipci_gercek_ad'];
$takipci_mail = $_POST['takipci_mail'];
$takipci_erisim = $_POST['takipci_erisim'];
$takipci_tanisiklik = $_POST['takipci_tanisiklik'];
$takipci_bildirim = $_POST['takipci_bildirim'];
$sorgusil = "update takipci set takipci_ad='$takipci_ad',takipci_gercek_ad='$takipci_gercek_ad',takipci_mail='$takipci_mail',takipci_erisim='$takipci_erisim',takipci_tanisiklik='$takipci_tanisiklik',takipci_bildirim='$takipci_bildirim' where takipci_id=".$_POST['takipci_id'];
mysql_query($sorgusil);
header("Location:takipciedit.php");
?>