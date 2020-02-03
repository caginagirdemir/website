<?php
$link = mysql_connect("94.73.144.226","cagin_1","123456") or die(mysqlerror());
$db = mysql_select_db("cagin_1",$link) or die(mysqlerror());
mysql_query ("SET NAMES 'latin5'");
mysql_query ("SET  CHARACTER SET 'latin5'");
mysql_query ("SET COLLATION_CONNECTION = 'latin5_turkish_ci'");
$haber_baslik = $_POST['haber_baslik'];
$haber_icerik = $_POST['haber_icerik'];
$haber_tarih = $_POST['haber_tarih'];
$sorguhaber = "insert into haber(haber_baslik,haber_icerik,haber_tarih) values ('".$haber_baslik."','".$haber_icerik."','".$haber_tarih."')";
mysql_query($sorguhaber);
mysql_close($link);
header("Location:index.php");
?>