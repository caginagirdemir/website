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
                  $link = mysql_connect("94.73.144.226","cagin_1","123456") or die(mysqlerror());
                  $db = mysql_select_db("cagin_1",$link) or die(mysqlerror());
                  mysql_query ("SET NAMES 'latin5'");
                  mysql_query ("SET  CHARACTER SET 'latin5'");
                  mysql_query ("SET COLLATION_CONNECTION = 'latin5_turkish_ci'");
                  ?>
			<div class="content">
            <form action="dokumaneklep.php" method="post" enctype="multipart/form-data">


				<p><table>
<tr>
	<td>dok_ad</td>
	<td><input type="text" value="" name="dok_ad" size="25" /></td>
</tr>
<tr>
	<td>dok_tarih</td>
	<td><input type="text" value="" name="dok_tarih" size="25" /></td>
</tr>
<tr>
	<td>dok_erisim</td>
	<td><select size="1" name="dok_erisim">
	<option value="1388430649_earth.png">global</option>
	<option value="1388430621_users.png">friend</option>
	<option value="1388431451_locked.png">personal</option>
</select></td>
</tr>
<tr>
	<td>dok_linki</td>
	<td><input type="file" size="30" name="photo" /></td>
</tr>
<tr>
	<td>dok_ekleyen</td>
	<td><?php
            session_start();
    if(isset($_SESSION['takipci_id']))
    {
        $sorgu3 ="select takipci_ad from takipci where takipci_id=".$_SESSION['takipci_id'];
        $veri = mysql_query($sorgu3);
        $result1 = mysql_fetch_assoc($veri);
        echo $result1['takipci_ad'];
        $_POST['takipci_ad'] = $result1['takipci_ad'];
    }
    else
    {
        echo "<p style='color: #3F651D;'>Bilinmiyor</p>";
    }
    ?></td>
</tr>
<tr>
	<td></td>
	<td></td>
</tr>
</table>
<input type="submit" value="gonder" />
</form>
<?php
if(isset($_GET['id']))
{
if($_GET['id'] == "hata2")
{
    echo "<p style='color: #AC150D;'>Arkadaþ Takipçi Eriþimi Olan Takipçiler Ekleyebilir !</p>";
}
if($_GET['id'] == "hata")
{
    echo "<p style='color: #AC150D;'>Dosya Boyutu 50 Mb Aþamaz</p>";
}
if($_GET['id'] == "hata1")
{
    echo "<p style='color: #AC150D;'>Takipçiler Döküman Ekliyebilir</p>";
}
}
?>
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