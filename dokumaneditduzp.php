<?php
$link = mysql_connect("94.73.144.226","cagin_1","123456") or die(mysqlerror());
$db = mysql_select_db("cagin_1",$link) or die(mysqlerror());
mysql_query ("SET NAMES 'latin5'");
mysql_query ("SET  CHARACTER SET 'latin5'");
mysql_query ("SET COLLATION_CONNECTION = 'latin5_turkish_ci'");
$dok_ad = $_POST['dok_ad'];
$dok_tarih = $_POST['dok_tarih'];
$dok_erisim = $_POST['dok_erisim'];
$dok_linki = $_POST['dok_linki'];
$dok_ekleyen = $_POST['dok_ekleyen'];
$dok_durum = $_POST['dok_durum'];
$sorgusil = "update dok set dok_ad='$dok_ad',dok_tarih='$dok_tarih',dok_erisim='$dok_erisim',dok_linki='$dok_linki',dok_durum='$dok_durum',dok_ek_takipciid=$dok_ekleyen where dok_id=".$_POST['dok_id'] ;
mysql_query($sorgusil);
header("Location:dokumanedit.php");
?>