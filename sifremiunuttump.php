<?php
$link = mysql_connect("94.73.144.226","cagin_1","123456") or die(mysqlerror());
$db = mysql_select_db("cagin_1",$link) or die(mysqlerror());
mysql_query ("SET NAMES 'latin5'");
mysql_query ("SET  CHARACTER SET 'latin5'");
mysql_query ("SET COLLATION_CONNECTION = 'latin5_turkish_ci'");
$sifremiunuttummail = $_POST['hatirlatmail'];
$sorgu7 = "select * from takipci where takipci_mail='".$sifremiunuttummail."'";
$sorgusifreunuttum = mysql_query($sorgu7);
echo $sorgu7;
$sifremiunuttumnum = mysql_num_rows($sorgusifreunuttum);
if($sifremiunuttumnum != 0)
{
include 'class.phpmailer.php';
$mail = new PHPMailer();
$sifremiunuttumresult = mysql_fetch_assoc($sorgusifreunuttum);
$mail->IsSMTP();
$mail->SMTPDebug = 0; //Hata g�sterimi i�in 0,1,2 de�erleri verebilirsiniz. B�y�d�k�e hata detay� artar
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = "smtp.gmail.com";
$mail->Port = 465;
$mail->Username = "caginagirdemir@gmail.com"; //Gmail kullan�c� ad�n�z
$mail->Password = "cagin1990+"; //Gmail �ifreniz
$mail->AddAddress("caginagirdemir@gmail.com", "caginagirdemir.com");

$mail->SetFrom($takipci_mail,$takipci_ad);

$mail->CharSet = 'iso-8859-9';
$mail->Subject = "caginagirdemir.com | �ifre Hat�rlatma";
$mail->IsHTML(true);
$body = "<img src='http://www.caginagirdemir.com/images/mail.png' /><br />";
$body .= "�ifrenizi Tekrar Talep Ettiniz A�a��daki Bilgiler Size Aittir<br/>";
$body .= "<strong>Kulla�n�c� Ad�n�z : </strong>".$sifremiunuttumresult['takipci_ad']."<br/>";
$body .= "<strong>Kullan�c� �ifreniz : </strong>".$sifremiunuttumresult['takipci_sifre']."<br/>";
$body .= "E�er talep sizden habersiz g�nderildiyse l�tfen caginagirdemir@gmail.com adresine bilgiledirme maili at�n�z.<br/>";
$body .= "caginagirdemir.com | �ifre Hat�rlatma Servisi";
$mail->Body=$body;
if($mail->Send()) {
    header("Location:sifremihatirlat.php?id=sucsess");
} else {
    header("Location:sifremihatirlat.php?id=fail");
}    
}
else
{    header("Location:sifremihatirlat.php?id=fail2");
}
mysql_close($link);
?>