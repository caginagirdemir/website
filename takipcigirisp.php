<?php
$link = mysql_connect("94.73.144.226","cagin_1","123456") or die(mysqlerror());
$db = mysql_select_db("cagin_1",$link) or die(mysqlerror());
mysql_query ("SET NAMES 'latin5'");
mysql_query ("SET  CHARACTER SET 'latin5'");
mysql_query ("SET COLLATION_CONNECTION = 'latin5_turkish_ci'");
$takipci_mail = $_POST['takipci_mail'];
$takipci_sifre = $_POST['takipci_sifre'];
$sorgu5 = "select * from takipci where takipci_mail='$takipci_mail' and takipci_sifre='$takipci_sifre'";
$result = mysql_query($sorgu5);
$sonuc1 = mysql_fetch_assoc($result);
echo $sonuc1['takipci_mail'];
echo $takipci_mail;
if($sonuc1['takipci_mail'] == $takipci_mail and $sonuc1['takipci_sifre'] == $takipci_sifre)
{
    session_start();
    $_SESSION['takipci_id'] = $sonuc1['takipci_id'];
    $_SESSION['takipci_erisim'] = $sonuc1['takipci_erisim'];
    header("Location:index.php");
}
else
{
    header("Location:takipcigiris.php?id=hata");
}
mysql_close($link);
echo isset($_SESSION['takipci_id']);
?>