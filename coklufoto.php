


<?php

$sorgu = $baglanti->prepare("SELECT * FROM cokluresim where urun_id=:urun_id ");// cokluresim tablosundaki tüm verileri çekiyoruz.
$sorgu->execute(array(


    'urun_id'=>$_GET['id']
  )); 

while ($sonuc = $sorgu->fetch()) {

    $id = $sonuc['id']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
    $foto = $sonuc['foto'];
   $urun_id= $sonuc['urun_id'];
// While döngüsü ile verileri sıralayacağız. Burada PHP tagını kapatarak tırnaklarla uğraşmadan tekrarlatabiliriz. 
    ?>

<div class="container" style="margin-top: 20px;">
<hr>
      <img src="admin/assets/cokluresim/<?php echo $foto ?>" alt="" class="d-block w-100" alt="...">
      
      </div>
      <?php } // Tekrarlanacak kısım bittikten sonra PHP tagının içinde while döngüsünü süslü parantezi kapatarak sonlandırıyoruz.
        ?>

      