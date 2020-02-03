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
	<h1><a href="#">cagnagirdemir.com</a></h1>
	<p> </p>
</div>
<!-- end header -->
<div id="page">
	<div id="content">
		<div class="feature bg7">
			<h1 class="title">caginagirdemir.com</h1>
			<div class="content">
				<p>
                <table>
                <?php
                  $link = mysql_connect("94.73.144.226","cagin_1","123456") or die(mysqlerror());
                  $db = mysql_select_db("cagin_1",$link) or die(mysqlerror());
                  mysql_query ("SET NAMES 'latin5'");
                  mysql_query ("SET  CHARACTER SET 'latin5'");
                  mysql_query ("SET COLLATION_CONNECTION = 'latin5_turkish_ci'");
                  $sorgu = mysql_query("select * from event");
                  while($sonucevent=mysql_fetch_array($sorgu))
                  {
                    if($sonucevent['event_resim'] == '1391531135_user_add.png')
                    {
                        echo "<tr>";
                        echo "<td><img style='border: 0;' src='images/1391531135_user_add.png' width='32' height='32' /> <b>Bir Takipçi Eklendi</b></td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td>".$sonucevent['event_icerik']." Adýnda Bir Takipçimiz Siteye Eklenmiþtir.</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td>".$sonucevent['event_tarih']."</td>";
                        echo "</tr>";
                    }
                    
                    if($sonucevent['event_resim'] == '1391531127_rss_add.png')
                    {
                        echo "<tr>";
                        echo "<td><img style='border: 0;' src='images/1391531127_rss_add.png' width='32' height='32' /> <b>Bir Haber Eklendi</b></td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td>".$sonucevent['event_icerik']." Baþlýklý Bir Haber Eklendi.</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td>".$sonucevent['event_tarih']."</td>";
                        echo "</tr>";
                    }
                    
                    if($sonucevent['event_resim'] == '1391531260_note_add.png')
                    {
                        echo "<tr>";
                        echo "<td><img style='border: 0;' src='images/1391531260_note_add.png' width='32' height='32' /> <b>Bir Döküman Eklendi</b></td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td>".$sonucevent['event_icerik']." Baþlýklý Bir Döküman Eklendi.</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td>".$sonucevent['event_tarih']."</td>";
                        echo "</tr>";
                    }
                    
                    if($sonucevent['event_resim'] == '1391531304_bullet_info.png')
                    {
                        echo "<tr>";
                        echo "<td><img style='border: 0;' src='images/1391531304_bullet_info.png' width='32' height='32' /> <b>Bir Video Eklendi</b></td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td>".$sonucevent['event_icerik']." Baþlýklý Bir Video Eklendi.</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td>".$sonucevent['event_tarih']."</td>";
                        echo "</tr>";
                    }
                    
                    if($sonucevent['event_resim'] == '1391534517_arrow_refresh.png')
                    {
                        echo "<tr>";
                        echo "<td><img style='border: 0;' src='images/1391534517_arrow_refresh.png' width='32' height='32' /> <b>Takipçi Bilgilerinde Deðiþiklik</b></td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td>".$sonucevent['event_icerik']." Takipçimizin Bilgileri Güncellendi.</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td>".$sonucevent['event_tarih']."</td>";
                        echo "</tr>";
                    }
                  }
                  ?>
                  </table>
                </p>
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
				<ul>
                <?php
                  $veriler = mysql_query("select * from haber");
                  while($sonuc=mysql_fetch_array($veriler))
                  { ;?>
                    <li><a href="haber.php?id=<?php echo $sonuc['haber_id']; ?>"> <?php echo $sonuc['haber_baslik']; ?> </a></li>
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
					<li class="first"><a href="takipciekle.php">Takipçi Ol</a> <i></i></li>
                    <li class="first"><a href="sifremihatirlat.php">Þifremi Unuttum</a> <i></i></li>
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