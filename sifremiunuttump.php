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
$mail->SMTPDebug = 0; //Hata gösterimi için 0,1,2 deðerleri verebilirsiniz. Büyüdükçe hata detayý artar
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = "smtp.gmail.com";
$mail->Port = 465;
$mail->Username = "caginagirdemir@gmail.com"; //Gmail kullanýcý adýnýz
$mail->Password = "cagin1990+"; //Gmail þifreniz
$mail->AddAddress("caginagirdemir@gmail.com", "caginagirdemir.com");

$mail->SetFrom($takipci_mail,$takipci_ad);

$mail->CharSet = 'iso-8859-9';
$mail->Subject = "caginagirdemir.com | Þifre Hatýrlatma";
$mail->IsHTML(true);
$body = "<img src='http://www.caginagirdemir.com/images/mail.png' /><br />";
$body .= "Þifrenizi Tekrar Talep Ettiniz Aþaðýdaki Bilgiler Size Aittir<br/>";
$body .= "<strong>Kullaýnýcý Adýnýz : </strong>".$sifremiunuttumresult['takipci_ad']."<br/>";
$body .= "<strong>Kullanýcý Þifreniz : </strong>".$sifremiunuttumresult['takipci_sifre']."<br/>";
$body .= "Eðer talep sizden habersiz gönderildiyse lütfen caginagirdemir@gmail.com adresine bilgiledirme maili atýnýz.<br/>";
$body .= "caginagirdemir.com | Þifre Hatýrlatma Servisi";
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