<?php  require 'header.php'; ?>

<?php  date_default_timezone_set('Europe/Istanbul'); ?>


<div style="width:750px; margin-top:10px;"class="container">

<div class="card p-5">
    <form action="" method="post">
        <?php 
        
        $duzenle = $db -> query("SELECT * FROM arac_kayit WHERE arac_id=".(int)$_GET['id']);
        $sonuc = $duzenle -> fetch(PDO::FETCH_ASSOC);
        
        if ($_POST) {
            $cikis_tarih = $_POST['arac_cikis_tarih'];
            
            if(isset($_POST['gerigel'])){
              echo '<div class="alert alert-danger text-center" role="alert">
                 <strong>İŞLEM YAPMADAN GERİ DÖNÜYORSUNUZ</strong>
                 </div>';
                 header('Refresh:1; parkedenarac.php');
            }
          elseif($cikis_tarih <>"" ){
              if($db -> query("UPDATE arac_kayit SET arac_cikis_tarih = '$cikis_tarih' WHERE arac_id=".$_GET['id']));{
                  echo '<div class="alert alert-primary text-center" role="alert">
                      <strong>İŞLEM BAŞARILI ANASAYFAYA YÖNLENDİRİLİYORSUNUZ</strong>
                      </div>';
                          header('Refresh:1; parkedenarac.php');
                          
              }
          }
          }
  
        
        ?>

<table class="table">

<tr>
    <h1 class="text-center">ARAÇ ÇIKIŞ</h1>
    <td><b style="color:red;" >ARAÇ GİRİŞ TARİHİ</b><b>  => <?php $sonuc['arac_giris_tarih']?> </b> <input type="text" name="arac_cikis_tarih" class="form-control" value="<?php echo date('d-m-Y H:i:s') ?>"></td>
</tr>



</table>
<button type="submit" name="gerigel" class="btn bg-danger" style="color:white; font-size:25px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5zM10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5z"/>
</svg>GERİ GEL</button>
<button type="submit" class="btn bg-primary" name="kaydet" style="color:white; font-size:25px;float:right;">KAYDET</button>







    </form>
</div>
</div>










<?php  require 'footer.php'; ?>