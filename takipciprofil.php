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
			<h1 class="title">Takip�i Profili</h1>
			<div class="content">
					<p>
    <?php
    $link = mysql_connect("94.73.144.226","cagin_1","123456") or die(mysqlerror());
    $db = mysql_select_db("cagin_1",$link) or die(mysqlerror());
    mysql_query ("SET NAMES 'latin5'");
    mysql_query ("SET  CHARACTER SET 'latin5'");
    mysql_query ("SET COLLATION_CONNECTION = 'latin5_turkish_ci'");
    $sorgu = "select * from takipci where takipci_id=".$_GET['id'];
    $sqlresult = mysql_query($sorgu);
    $result = mysql_fetch_assoc($sqlresult);
    ?>
    <table>
<tr>
	<td bgcolor="#BFD5E6"><b>Takip�i Nick</b></td>
	<td><?php echo $result['takipci_ad']; ?></td>
	<td></td>
</tr>
<tr>
	<td><b>Takip�i Ger�ek Ad</b></td>
	<td><?php echo $result['takipci_gercek_ad']; ?></td>
	<td></td>
</tr>
<tr>
	<td bgcolor="#BFD5E6"><b>Takip�i Eri�im</b></td>
	<td><img style="border: 0;" src="images/<?php echo $result['takipci_erisim']; ?>" width="16" height="16" /></td>
	<td></td>
</tr>
<tr>
	<td><b>Takip�i Tan���kl���</b></td>
	<td><?php echo $result['takipci_tanisiklik']; ?></td>
	<td></td>
</tr>
<tr>
	<td bgcolor="#BFD5E6"><b>Takip�i Mail</b></td>
	<td><?php echo $result['takipci_mail']; ?></td>
	<td></td>
</tr>
<tr>
	<td><b>Takip�i Bildirim</b></td>
	<td><?php echo $result['takipci_bildirim']; ?></td>
	<td></td>
</tr>
<tr>
	<td bgcolor="#BFD5E6"><b>Takip�i Memleket</b></td>
	<td><?php echo $result['takipci_home']; ?></td>
	<td></td>
</tr>
<tr>
	<td><b>Takip�i �ehir</b></td>
	<td><?php echo $result['takipci_loc']; ?></td>
	<td></td>
</tr>
<tr>
	<td bgcolor="#BFD5E6"><b>Takip�i Cinsiyet</b></td>
	<td><?php echo $result['takipci_gender']; ?></td>
	<td></td>
</tr>
</table>
<br />
<a href="#"><p style="color: #788D25;">Bildirimleri Kapat</p></a>
<a href="#"><p style="color: #AC150D;">Takip�i Kayd�m� Sil</p></a>
<a href="#"><p style="color: #457043;">�ifremi De�i�tir</p></a>
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
					<li><a href="dokumanekle.php" accesskey="2" title="">D�k�man Ekle</a></li>
					<li><a href="dokuman.php" accesskey="3" title="">D�k�manlar</a></li>
					<li><a href="video.php" accesskey="4" title="">Videolar</a></li>
					<li><a href="hakkimda.php" accesskey="5" title="">Hakk�mda</a></li>
					<li><a href="arsiv.php" accesskey="6" title="">Ar�iv</a></li>
				</ul>
			</li>
			<li id="news">
				<h2 class="bg2">Haberler</h2>
				<ul>
                <?php
                  $link = mysql_connect("94.73.144.226","cagin_1","123456") or die(mysqlerror());
                  $db = mysql_select_db("cagin_1",$link) or die(mysqlerror());
                  mysql_query ("SET NAMES 'latin5'");
                  mysql_query ("SET  CHARACTER SET 'latin5'");
                  mysql_query ("SET COLLATION_CONNECTION = 'latin5_turkish_ci'");
                  $veriler = mysql_query("select * from haber");
                  while($sonuc=mysql_fetch_array($veriler))
                  { ;?>
                    <li><a href="haber.php?id=<?php echo $sonuc['haber_id']; ?>"> <?php echo $sonuc['haber_baslik']; ?> </a></li>
                  <?php }
                ?>
				</ul>
			</li>
			<li id="archives">
				<h2 class="bg3">Takip�iler</h2>
				<ul>
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
                 {echo "<li class='first'><a href='takipcigiris.php'>Takip�i Giri�</a> <i></i></li>";
                  echo "<li class='first'><a href='fgiris.php'>Facebook Giri�i</a> <i></i></li>";
                  echo "<li class='first'><a href='takipciekle.php'>Takip�i Ol</a> <i></i></li>";
                  echo "<li class='first'><a href='sifremihatirlat.php'>�ifremi Unuttum</a> <i></i></li>";}
                ?>
                    <?php
                    if($takipciveri2['takipci_erisim'] == "1388431451_locked.png")
                    {
                    echo "<li><a href='takipciedit.php'>Takip�i Edit</a> <i></i></li>";
                    echo "<li><a href='dokumanedit.php'>D�k�man Edit</a> <i></i></li>";
                    echo "<li><a href='haberekle.php'>Haber Ekle</a> <i></i></li>";
                    }
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