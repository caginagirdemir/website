<?php
session_start();
if($_SESSION['takipci_id'] != null and $_SESSION['takipci_erisim'] == "1388430621_users.png")
{
$link = mysql_connect("94.73.144.226","cagin_1","123456") or die(mysqlerror());
$db = mysql_select_db("cagin_1",$link) or die(mysqlerror());
mysql_query ("SET NAMES 'latin5'");
mysql_query ("SET  CHARACTER SET 'latin5'");
mysql_query ("SET COLLATION_CONNECTION = 'latin5_turkish_ci'");
$dok_ad = $_POST['dok_ad'];
$dok_tarih = $_POST['dok_tarih'];
$dok_erisim = $_POST['dok_erisim'];
$newfilename = strtolower($_FILES['photo']['name']);
$filename = $_FILES['photo']['name'];
if($_FILES['photo']['size'] > 52428800)
{
    header("Location:dokumanekle.php?id=hata");
}
move_uploaded_file($_FILES['photo']['tmp_name'],'uploads/'.$newfilename);
$dok_ek_takipciid = $_SESSION['takipci_id'];
$sorgu5 = "insert into dok(dok_ad,dok_tarih,dok_erisim,dok_linki,dok_ek_takipciid) values ('$dok_ad','$dok_tarih','$dok_erisim','uploads/$filename','$dok_ek_takipciid')";
echo $sorgu5;
mysql_query($sorgu5);
mysql_close($link);
$_SESSION['dok_ad']=$dok_ad;
header("Location:dokumanmail.php");
}
if($_SESSION['takipci_id'] != null and $_SESSION['takipci_erisim'] == "1388430649_earth.png")
{
        header("Location:dokumanekle.php?id=hata2");
}
if($_SESSION['takipci_id'] == null)
{
    header("Location:dokumanekle.php?id=hata1");
}
?>