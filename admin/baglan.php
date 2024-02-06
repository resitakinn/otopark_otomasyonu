
<?php 

try {
    $db = New PDO ('mysql:host=localhost;dbname=otopark_otomasyon', 'root' , '');
    // echo 'Veri Tabanı Başarılı Bİr Şekilde Oluşmuştur';
} catch (Exception $e) {
   $e -> getMessage();
}

ob_start();
session_start();




?>