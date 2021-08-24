<?php include 'header.php'?>

<?php
include("admin/vt.php"); // veritabanı bağlantımızı sayfamıza ekliyoruz. 
?>
<?php

$sorgu = $baglanti->prepare("SELECT * FROM detay Where gelen_id=:gelen_id");// detay tablosundaki tüm verileri çekiyoruz.
$sorgu->execute(
  ['gelen_id' => (int)$_GET["id"]
  
  ]);
 
$sonuc = $sorgu->fetch(PDO::FETCH_ASSOC);

    
// While döngüsü ile verileri sıralayacağız. Burada PHP tagını kapatarak tırnaklarla uğraşmadan tekrarlatabiliriz. 
    ?>

<div class="container">
    <div class="row">
      <div class=" col-lg-8 col-md-4 col-xs-4 w-100 " style="margin-top: 100px;">
        <img src="admin/assets/kapakfoto/<?php echo $sonuc['foto'] ?>" class="d-block w-100" alt="...">
      </div>
      <div class="col-lg-4 col-md-8 col-xs-8 w-100">


        <div class="container" id="prj2" style="margin-top: 100px; ">

          <h6 class="container  " style="  margin-top: 10px;  ">
            <h5>Proje Yeri:</h5><?php echo $sonuc['projeyeri'] ?>
            <hr>
            <h5>Proje Ofisi:</h5><?php echo $sonuc['projeofisi'] ?>
            <hr>
            <h5>Proje Tipi:</h5> <?php echo $sonuc['projetipi']?>
            <hr>
            <h5>Proje Tipi Grubu:</h5><?php echo $sonuc['projetipigrubu'] ?>
            <hr>
            <h5>Tasarım Ekibi:</h5><?php echo $sonuc['tasarimekibi'] ?>

          </h6>


        </div>
      </div>
    </div>
   
    
    <?php include 'coklufoto.php' ?>

     

    <?php include 'footer.php' ?>