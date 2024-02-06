<?php 

require 'header.php';

if ($_GET) {
    if ($db -> query("DELETE FROM arac_kayit WHERE arac_id=".(int)$_GET['id'])) {
     
       header('Location:parkedenarac.php?durum=ok');
    }
}

?>