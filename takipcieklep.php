<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=latin5_turkish_ci" />
<title>caginagirdemir.com 2013</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="header">

    <h1><a href="#">caginagirdemir.com</a></h1>
	<p> </p>
</div>
<!-- end header -->
<div id="page">
	<div id="content">
		<div class="feature bg7">
			<h1 class="title">Takipçi Oldunuz</h1>
			<div class="content">
            <?php
$link = mysql_connect("94.73.144.226","cagin_1","123456") or die(mysqlerror());
$db = mysql_select_db("cagin_1",$link) or die(mysqlerror());
mysql_query ("SET NAMES 'latin5'");
mysql_query ("SET  CHARACTER SET 'latin5'");
mysql_query ("SET COLLATION_CONNECTION = 'latin5_turkish_ci'");
$takipci_ad = $_POST['takipci_ad'];
$takipci_mail = $_POST['takipci_mail'];
$takipci_mail_tekrar = $_POST['takipci_mail_tekrar'];
$takipci_sifre = $_POST['takipci_sifre'];
$takipci_sifre_tekrar = $_POST['takipci_sifre_tekrar'];
if($takipci_mail==$takipci_mail_tekrar and $takipci_sifre==$takipci_sifre_tekrar)
{
$sorgutakipci = "select takipci_mail from takipci where takipci_mail='".$takipci_mail."'";
$sonuctakipci = mysql_query($sorgutakipci);
if(mysql_num_rows($sonuctakipci) == 0)
{
$sorgu5 = "insert into takipci(takipci_ad,takipci_mail,takipci_sifre) values ('$takipci_ad','$takipci_mail','$takipci_sifre')";
mysql_query($sorgu5);
mysql_close($link);
echo "Takipçi Nick ".$takipci_ad."<br>";
echo "Takipçi Mail ".$takipci_mail."<br>";
echo "Takipçi Eriþim ";
include 'class.phpmailer.php';
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 0; //Hata gösterimi için 0,1,2 deðerleri verebilirsiniz. Büyüdükçe hata detayý artar
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = "smtp.gmail.com";
$mail->Port = 465;
$mail->Username = "caginagirdemir@gmail.com"; //Gmail kullanýcý adýnýz
$mail->Password = "cagin1990+"; //Gmail þifreniz
$mail->AddAddress("admin@caginagirdemir.com", "caginagirdemir.com");

$mail->SetFrom($takipci_mail,$takipci_ad);

$mail->CharSet = 'iso-8859-9';
$mail->Subject = "Sevgili ".$takipci_ad." | caginagirdemir.com Takipçiler";
$mail->IsHTML(true);
$body = "<img src='http://www.caginagirdemir.com/images/mail.png' /><br />";
$body .= "caginagirdemir@gmail.com Takipçisi Oldunuz <br />";
$body .= "<strong>Kullaýnýcý Adýnýz :</strong>".$takipci_ad."<br/>";
$body .= "<strong>Kullanýcý Þifreniz :</strong>".$takipci_sifre."<br/>";
$body .= "<strong>Kullanýcý Eriþiminiz :</strong> Herkeze Açýk <br/>";
$body .= "Eðer Arkadaþýmsanýz Eriþiminiz Arkadaþ Statüsüne Onaylandýktan Sonra Çýkacaktýr.<br/>";
$body .= "Eriþiminiz Arkadaþ Statüsünde Olduðunda Mail Gelicek Eklenen Dökümanlarlarýda Mail Ýle Bilgilendiriliceksiniz.<br/>";
$body .= "caginagirdemir.com | Takipçi Mail Sistemi";
$mail->Body=$body;
if($mail->Send()) {
    echo 'Mail gönderildi!';
} else {
    echo 'Mail gönderilirken bir hata oluþtu: ' . $mail->ErrorInfo;
}
}
else
{
    header("Location:takipciekle.php?id=hata1");
}
}
else
{    header("Location:takipciekle.php?id=hata2");}
?><img style="border: 0;" src="images/1388430649_earth.png" width="24" height="24" /><br />
			</div>
		</div>
		<div class="box">
		</div>
		<div class="box" style="padding-left: 19px;">
		</div>
	</div>
	<!-- end content -->
	<div id="sidebar">
		<ul>
			<li id="menu" class="bg6">
				<h2 class="bg1">Menu</h2>
				<ul>
					<li class="first"><a href="index.php" accesskey="1" title="">Ev</a></li>
					<li><a href="dokumanekle.php" accesskey="2" title="">Döküman Ekle</a></li>
					<li><a href="dokuman.php" accesskey="3" title="">Dökümanlar</a></li>
					<li><a href="video.php" accesskey="4" title="">Videolar</a></li>
					<li><a href="hakkimda.php" accesskey="5" title="">Hakkýmda</a></li>
					<li><a href="arsiv.php" accesskey="6" title="">Arþiv</a></li>
				</ul>
			</li>
			<li id="news">
				<h2 class="bg2">Haberler</h2>
                <?php
                session_start();
                 //echo $_SESSION['takipci_id'];
                 if($_SESSION['takipci_id'] != null)
                 {
                    $takipcisorgu = "select * from takipci where takipci_id=".$_SESSION['takipci_id'];
                    $takipciveri = mysql_query($takipcisorgu);
                    $takipciveri2 = mysql_fetch_assoc($takipciveri);
                    echo "<li class=''><img style='border: 0;' src='images/".$takipciveri2['takipci_erisim']."' width='24' height='24' />".$takipciveri2['takipci_ad']."<br/> | <a href='takipcicikis.php'><img style='border: 0;' src='images/1390098304_right.png' width='24' height='24' /></a> | <a href='takipciprofil.php?id=".$takipciveri2['takipci_id']."'><img style='border: 0;' src='images/1390098297_configuration.png' width='24' height='24' /></a> | </li>";
                 }
                 if ($_SESSION['takipci_id'] == null)
                 {echo "<li class='first'><a href='takipcigiris.php'>Takipçi Giriþ</a> <i></i></li>";
                  echo "<li class='first'><a href='fgiris.php'>Facebook Giriþi</a> <i></i></li>";
                  echo "<li class='first'><a href='takipciekle.php'>Takipçi Ol</a> <i></i></li>";
                  echo "<li class='first'><a href='sifremihatirlat.php'>Þifremi Unuttum</a> <i></i></li>";}
                ?>
                    <li><a href="haber.php?id=<?echo $sonuc['haber_id'] ?>"> <?echo $sonuc['haber_baslik']; ?> </a></li>
                  <?php }
                ?>
				</ul>
			</li>
			<li id="archives">
				<h2 class="bg3">Takipçiler</h2>
				<ul>
                <?php
                session_start();
                $_SESSION['takipci_id'];
                 if($_SESSION['takipci_id'] != null)
                 {
                    $takipcisorgu = "select * from takipci where takipci_id=".$_SESSION['takipci_id'];
                    $takipciveri = mysql_query($takipcisorgu);
                    $takipciveri2 = mysql_fetch_assoc($takipciveri);
                    echo "<li class=''><img style='border: 0;' src='images/".$takipciveri2['takipci_erisim']." width='24' height='24' />".$takipciveri2['takipci_ad']." | <a href='takipcicikis.php'><img style='border: 0;' src='images/1390098304_right.png' width='24' height='24' /></a> | <a href='takipciprofil.php?id=".$takipciveri2['takipci_id']."'><img style='border: 0;' src='images/1390098297_configuration.png' width='24' height='24' /></a> | </li>";
                 }
                 if ($_SESSION['takipci_id'] == null)
                 {echo "<li class='first'><a href='takipcigiris.php'>Takipçi Giriþ</a> <i></i></li>";}
                ?>
                    <?php mysql_close($link); ?>
				</ul>
			</li>
		</ul>
	</div>
	<!-- end sidebar -->
	<div style="clear: both;">&nbsp;</div>
</div>
<!-- end page -->
<div id="footer">
	<p id="legal"><strong>caginagirdemir.com</strong></p>
	<p id="links"><img style="border: 0;" src="images/alt2.png" width="500" height="200" /></p>
</div>
<!-- end footer -->
</body>
</html>