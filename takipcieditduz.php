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
			<h1 class="title">Döküman Ekle</h1>
                  <?php
                  session_start();
                  $link = mysql_connect("94.73.144.226","cagin_1","123456") or die(mysqlerror());
                  $db = mysql_select_db("cagin_1",$link) or die(mysqlerror());
                  mysql_query ("SET NAMES 'latin5'");
                  mysql_query ("SET  CHARACTER SET 'latin5'");
                  mysql_query ("SET COLLATION_CONNECTION = 'latin5_turkish_ci'");
                  $sorgudokumanduz = "select * from takipci where takipci_id=".$_GET['id'];
                  $sorgudokumanduz2 = mysql_query($sorgudokumanduz);
                  $sorgudokumanduzresult = mysql_fetch_assoc($sorgudokumanduz2);
                  ?>
			<div class="content">
            <form action="takipcieditduzp.php" method="post" enctype="multipart/form-data">


				<p><table>
<tr>
	<td>takipci_id</td>
	<td><input type="text" readonly="true" value="<?php echo $sorgudokumanduzresult['takipci_id']; ?>" name="takipci_id" size="25" /></td>
</tr>
<tr>
	<td>takipci_ad</td>
	<td><input type="text" value="<?php echo $sorgudokumanduzresult['takipci_ad']; ?>" name="takipci_ad" size="25" /></td>
</tr>
<tr>
	<td>takipci_gercek_ad</td>
	<td><input type="text" value="<?php echo $sorgudokumanduzresult['takipci_gercek_ad']; ?>" name="takipci_gercek_ad" size="25" /></td>
</tr>
<tr>
	<td>takipci_mail</td>
	<td><input type="text" value="<?php echo $sorgudokumanduzresult['takipci_mail']; ?>" name="takipci_mail" size="25" /></td>
</tr>
<tr>
	<td>takipci_erisim</td>
	<td><input type="text" value="<?php echo $sorgudokumanduzresult['takipci_erisim']; ?>" name="takipci_erisim" size="25" /></td>
</tr>
<tr>
	<td>takipci_tanisiklik</td>
	<td><input type="text" value="<?php echo $sorgudokumanduzresult['takipci_tanisiklik']; ?>" name="takipci_tanisiklik" size="25" /></td>
</tr>
<tr>
	<td>takipci_bildirim</td>
	<td><input type="text" value="<?php echo $sorgudokumanduzresult['takipci_bildirim']; ?>" name="takipci_bildirim" size="25" /></td>
</tr>
<tr>
	<td>takipci_sifre</td>
	<td><input type="text" value="<?php echo $sorgudokumanduzresult['takipci_sifre']; ?>" name="takipci_sifre" size="25" disabled /></td>
</tr>
<tr>
	<td>takipci_memleket</td>
	<td><input type="text" value="<?php echo $sorgudokumanduzresult['takipci_home']; ?>" name="takipci_sifre" size="25" disabled /></td>
</tr>
<tr>
	<td>takipci_location</td>
	<td><input type="text" value="<?php echo $sorgudokumanduzresult['takipci_loc']; ?>" name="takipci_sifre" size="25" disabled /></td>
</tr>
<tr>
	<td>takipci_cinsiyet</td>
	<td><input type="text" value="<?php echo $sorgudokumanduzresult['takipci_gender']; ?>" name="takipci_sifre" size="25" disabled /></td>
</tr>
</table>
<input type="submit" value="düzenle" />
</form>
<br />
<br />
<br />
<img style="border: 0;" src="images/1388430649_earth.png" width="24" height="24" /><p style='color: #AC150D;'>Herkeze Açýk : 1388430649_earth.png</p><br />
<img style="border: 0;" src="images/1388430621_users.png" width="24" height="24" /><p style='color: #AC150D;'>Arkadaþlara Açýk : 1388430621_users.png</p><br />
<img style="border: 0;" src="images/1388431451_locked.png" width="24" height="24" /><p style='color: #AC150D;'>Kiþiye Özel : 1388431451_locked.png</p><br />
<br />
<br />
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
                  { ?>
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