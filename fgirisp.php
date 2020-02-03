<?php
//echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
$link = mysql_connect("94.73.144.226","cagin_1","123456") or die(mysqlerror());
$db = mysql_select_db("cagin_1",$link) or die(mysqlerror());

session_start();

$fbayar = array();
$fbayar['appId']="625904840778257";
$fbayar['secret']="d8910d75d3a087f1fb2b168cec6b5989";
require_once("facebook.php");
$facebook = new Facebook($fbayar);

if(isset($_GET['error'])){
     // Ýzin verilmedi, iptale týklandý.
     header("Location: index.php");
     // Hiçbirþey yapmadýk, kullanýcýyý sadece index.php sayfasýna yönlendirdik.
}
else{

     // Ýzin verilme koþulu saðlandýysa
     $fid = $facebook->getUser();
     $bilgiler = $facebook->api("/{$fid}",'GET');
     
     $tamisim2 = $bilgiler['name'];
     
     $home = array();
     $home = $bilgiler['hometown'];
     echo $home['name'];
     $home2 = $home['name'];      
     $loc = array();
     $loc = $bilgiler['location'];
     echo $loc['name'];
     $loc2 = $loc['name'];  
     
        $Ara 	= array(
               "Ä±",
               "Ä°",
               "Ã¼",
               "Ãœ",
               "ÅŸ",
               "Åž",
               "Ã–",
               "Ã¶",
               "Ã‡",
               "Ã§",
               "Äž",
               "ÄŸ"
               ); 
   $Degis 	= array(
               "ý",
               "Ý",
               "ü",
               "Ü",
               "þ",
               "Þ",
               "Ö",
               "ö",
               "Ç",
               "ç",
               "Ð",
               "ð"
               ); 


     $tamisim =  str_ireplace($Ara, $Degis, $tamisim2);
     $home2 =  str_ireplace($Ara, $Degis, $home2);
     $loc2 =  str_ireplace($Ara, $Degis, $loc2);
     $mail = $bilgiler['email'];
     
     $gender = $bilgiler['gender'];
        
     $sorgu = "SELECT * FROM takipci WHERE takipci_mail='".$mail."'";
     echo $sorgu;
     $takipcikontrol = mysql_query($sorgu);
     
     
     if(mysql_num_rows($takipcikontrol)){
        
          $takipcibilgi = mysql_fetch_assoc($takipcikontrol);
        echo $takipcibilgi['takipci_id'];
            $_SESSION['tamisim']=$tamisim;
            $_SESSION['mail'] = $mail;
            $_SESSION['takipci_id'] = $takipcibilgi['takipci_id'];
            echo $_SESSION['takipci_id'];
            }
            else
            {
            mysql_query ("SET NAMES 'latin5'");
            mysql_query ("SET  CHARACTER SET 'latin5'");
            mysql_query ("SET COLLATION_CONNECTION = 'latin5_turkish_ci'");
         mysql_query("INSERT INTO takipci (takipci_ad,takipci_mail,takipci_home,takipci_loc,takipci_gender) VALUES ('$tamisim','$mail','$home2','$loc2','$gender')");

          $uyeidcek = mysql_query("SELECT * FROM takipci WHERE takipci_mail='".$mail."'");
          $yeniuyeid = mysql_fetch_assoc($uyeidcek);

            $_SESSION['tamisim']=$tamisim;
            $_SESSION['mail'] = $mail;
            $_SESSION['takipci_id'] = $yeniuyeid['takipci_id'];
            
            echo $_SESSION['takipci_id'];
          }

 
 }
           header("Location:index.php#");      
?>