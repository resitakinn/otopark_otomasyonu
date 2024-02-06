<?php 

try {
    $db = New PDO ('mysql:host=localhost;dbname=otopark_otomasyon', 'root' , '');
    // echo 'Veri Tabanı Başarılı Bİr Şekilde Oluşmuştur';
} catch (Exception $e) {
   $e -> getMessage();
}


?>


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
  </head>
  <body style="background-color:gray;">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="admin/index.php">Giriş Yapmak İçin Tıklayınız</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


    
     
      
    </ul>
    
  </div>
</nav>




<br>


<table class="table table-dark text-center" >
  <thead>
    <tr>
      <th scope="col">SIRA NO</th>
      <th scope="col">PLAKA</th>
      <th scope="col">ARAC KAT </th>
      <th scope="col">ARAC BLOK</th>
      <th scope="col">ARAÇ GİRİŞ TARİHİ</th>
      <th scope="col">ARAÇ ÇIKIŞ TARİHİ</th>
      
    </tr>
  </thead>


  <?php  
   $kaydet = $db ->query('SELECT * FROM arac_kayit');
   $sira = 0;
   foreach ($kaydet as $kayit) {
     $sira = ++ $sira;
    $id = $kayit['arac_id'];
    $plaka = $kayit['arac_plaka'];
    $kat = $kayit['arac_kat'];
    $blok = $kayit['arac_blok'];
    $giris_tarihi = $kayit['arac_giris_tarih'];
    $cikis_tarih = $kayit['arac_cikis_tarih'];
   
   
  ?>
  <tbody>
    <tr>
      <th style="background-color:red;"><?php echo $sira ?></th>
      <td><?php echo $plaka ?></td>
      <td><?php echo $kat ?></td>
      <td><?php echo $blok ?></td>
      <td><?php echo $giris_tarihi ?></td>
      <td><?php echo $cikis_tarih ?></td>
     
    </tr>
    
  </tbody>
  <?php }
   ?>
</table>






   
   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>