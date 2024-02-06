<?php require 'header.php'; 


?>
z

<div id="container"class="container p-5">
    <div class="card p-2">
        <div class="form" >
        <?php 
        if (isset($_POST['kaydet'])) {
            $arac_plaka = $_POST['arac_plaka'];
            $arac_kat = $_POST['arac_kat'];
            $arac_blok = $_POST['arac_blok'];
            if($arac_plaka==""  || $arac_kat=="" || $arac_blok==""){
                echo '<div class="alert alert-danger text-center" role="alert">
                <strong>BOŞ ALAN BIRAKMAYINIZ</strong>
                </div>';
                    header('Refresh:2; anasayfa.php');
            }else {
                 $kontrol = $db -> query("SELECT * FROM arac_kayit WHERE arac_plaka='$arac_plaka' ")->fetch();
                
                if ($kontrol){
                    
                    echo '<div class="alert alert-success text-center" role="alert">
                    <strong>GİRİLEN PLAKA OTOPARKTA MEVCUTTUR</strong>
                    </div>';
                        header('Refresh:2; anasayfa.php');
                }else {
                    $kaydet = $db -> prepare('INSERT INTO arac_kayit SET
                    arac_plaka = ?,
                    arac_blok = ?,
                    arac_kat =?
                    ');
                    $kaydet -> execute([
                        $arac_plaka , $arac_blok , $arac_kat
                    ]);
                    if ($kaydet) {
                        echo '<div class="alert alert-primary text-center" role="alert">
                        <strong>BAŞARILI BİR ŞEKİLDE ARAÇ KAYIT EDİLDİ</strong>
                        </div>';
                            header('Refresh:2; parkedenarac.php');
                    }
                }
            }
                
        }

       
?>
      <h1 class="text-center mb-3">ARAÇ KAYIT</h1>
            <form action="anasayfa.php" method="post">
                <input type="text" name="arac_plaka" class="form-control text-center" placeholder="Plaka Giriniz" style="color:black;" ><br>
                <select name="arac_kat" class="form-control text-center"><br>
                    <option value="">KAT SEÇİNİZ</option>
                    <option value="KAT 1">KAT 1</option>
                    <option value="KAT 2">KAT 2</option>
                    <option value="KAT 3">KAT 3</option>
                </select><br>
                <select name="arac_blok" class="form-control text-center"><br>
                    <option value="">BLOK SEÇİNİZ</option>
                    <option value="A BLOK">A BLOK</option>
                    <option value="B BLOK">B BLOK</option>
                    <option value="C BLOK">C BLOK</option>
                    <option value="D BLOK">D BLOK</option>
                    <option value="E BLOK">E BLOK</option>
                </select><br>
               
               <div class="text-center">
                
               <button type="reset"  class="btn bg-danger">Sıfırla</button>
               <button type="submit" name="kaydet" class="btn bg-primary">KAYDET</button>
               </div>
            </form>
        </div>
    </div>
</div>


      
