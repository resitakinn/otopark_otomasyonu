<?php 

require 'baglan.php';


$kullanicicek = $db -> prepare('SELECT * FROM kullanici_giris   WHERE mail=:mail');
$kullanicicek ->execute([
  'mail' => $_SESSION['mail']
]);
$say = $kullanicicek -> rowCount();
$kaydet = $kullanicicek -> fetch(PDO::FETCH_ASSOC);
if ($say == 0 ) {
 header('location:index.php?izinsizgiris');
 
}



?>
<?php  include 'mesaj.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <title>Otopark Otomasyonu</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="stil.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="anasayfa navbar-brand" href="anasayfa.php">Anasayfa</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="parkedenarac.php">Park Eden Araç</a>
      </li>
    

      
    </ul>
    <form class="form-inline my-2 my-lg-0"action="parkedenarac.php" method="post">
      <input class="main-search form-control mr-sm-2" type="search" placeholder="Arama Yapınız" name="bul" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="margin:10px;">ARA</button>
     <button type="submit" name="cikis" class="btn bg-danger " style="color:white;"><a href="cikis.php" style="color:white;">ÇIKIŞ YAP</a></button>

    </form>
  </div>
</nav>
<script>
var txt = "PLAKA GİRİNİZ";
var timeOut;
var txtLen = txt.length;
var char = 0;
$('.main-search').attr('placeholder', '|');
(function typeIt() {
    var humanize = Math.round(Math.random() * (200 - 30)) + 30;
    timeOut = setTimeout(function () {
        char++;
        var type = txt.substring(0, char);
        $('.main-search').attr('placeholder', type + '|');
        typeIt();

        if (char == txtLen) {
            $('.main-search').attr('placeholder', $('.main-search').attr('placeholder').slice(0, -1)) // remove the '|'
            clearTimeout(timeOut);
        }

    }, humanize);
}());
</script>

<br>
<?php  


if (isset($_POST['bul'])) {
$bul = $_POST['bul'];
if (!$bul) {
  echo '<div class="alert alert-danger text-center" role="alert">
  <strong>ARAMA YAPMAK İÇİN BİRŞEY YAZINIZ</strong>
  </div>';
  header('Refresh:2;parkedenarac.php');
}else{
  $plakabul = $db -> prepare('SELECT * FROM arac_kayit WHERE arac_plaka LIKE :arac_plaka');
  $plakabul -> execute(array(':arac_plaka' => '%'.$bul.'%'));
  if ($plakabul -> rowCount()) {
    foreach ($plakabul as $plaka) {
      
      echo '<div class="alert alert-success text-center" role="alert">'.
      $plaka['arac_plaka'].'<strong> <b style="color:red;">ARAÇ DAHA ÇIKIŞ YAPMADI</b></strong>
      </div>';
      header('Refresh:8;parkedenarac.php');
      
    }
  }else {
    echo '<div class="alert alert-primary text-center" role="alert">
    <strong>GİRİLEN PLAKA OTOPARKTA YOKTUR</strong>
      </div>';
      header('parkedenarac.php');
  }
}
}




?>

