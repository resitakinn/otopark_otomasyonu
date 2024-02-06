
<?php   

require 'baglan.php';
// ob start ve session destroy uygulamak lazım yoksa kullanıcı cıkışı onaylamaz

ob_start();
session_destroy();

echo '<h1 style=\'text-align:center; margin-top:45px; color:red; font-weight:bold;\'>BAŞARI BİR ŞEKİLDE ÇIKIŞ YAPTINIZ. ANASAYFAYA
YÖNLENDİRİLİYORSUNUZ.. </h1>';
header('Refresh:2; ../index.php');

//sayfada Çıkış Yapamak İçin gerekli kodlar

?>