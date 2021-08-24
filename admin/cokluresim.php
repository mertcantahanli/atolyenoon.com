
<?php include 'include/header.php'; ?>
<?php include 'vt.php'; ?>


<head> 
<link rel="stylesheet" type="text/css" href="dropzone.css">
<script src="dropzone.js" type="text/javascript"></script>
<script>src="jquery-3.5.1.min.js "</script>

</head>
<section class="content-header">
    <h1>
        Dashboard
        <small>Version 2.0</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
<div class="container">
<div class="col-md-6">
    <!-- enctype="multipart/form-data" -- form tagına eklenmezse dosya yüklemesi yapılamaz -->
    <form action="cokluresimyukle.php" method="post" enctype="multipart/form-data" class="dropzone">

        <input type="hidden" name="id" value="<?php echo $_GET['id']?>">

    </form>

    <!-- Öncelikle HTML düzenimizi oluşturuyoruz. Daha sonra girdiğimiz verileri veritabanına eklemesi için PHP kodlarına geçiyoruz. -->

    <?php
    ini_set('max_execution_time',0);
     include 'cokluresimyukle.php';
    if ($_POST) { // Sayfada post olup olmadığını kontrol ediyoruz.
        
        
        // Veri alanlarının boş olmadığını kontrol ettiriyoruz. başka kontrollerde yapabilirsiniz.
        if (isset($_FILES['foto'])) {

            if ($_FILES['foto']['error'] != 0) {
                echo 'Dosya yüklenirken hata gerçekleşti lütfen daha sonra tekrar deneyiniz.';
            } else {

                $dosya_adi = $_FILES['foto']['name'];
                if (file_exists('assets/cokluresim/' . $dosya_adi)) {
                    echo "$dosya_adi diye bir dosya var";
                } else {
                    $boyut = $_FILES['foto']['size'];
                    if ($boyut > (1024 * 1024 * 30)) {
                        echo 'Dosya boyutu 30MB den büyük olamaz.';
                    } else {
                        $dosya_tipi = $_FILES['foto']['type'];
                        $dosya_uzanti = explode('.', $dosya_adi);
                        $dosya_uzanti = $dosya_uzanti[count($dosya_uzanti) - 1];

                        if (!in_array($dosya_tipi, ['image/png', 'image/jpeg']) || !in_array($dosya_uzanti, ['png', 'jpg'])) {
                            //if (($dosya_tipi != 'image/png' || $dosya_uzanti != 'png' )&&( $dosya_tipi != 'image/jpeg' || $dosya_uzanti != 'jpg')) {
                            echo 'Hata, dosya türü JPEG veya PNG olmalı.';
                        } else {
                            $foto = $_FILES['foto']['tmp_name'];
                            copy($foto, 'assets/cokluresim/' . $dosya_adi);

                            echo 'Dosyanız upload edildi!';

                            //Eklencek veriler diziye ekleniyor
                            $satir = [
                                'foto' => $dosya_adi,
                               
                            ];

                            // Veri ekleme sorgumuzu yazıyoruz.
                            $sql = "INSERT INTO cokluresim SET foto=:foto
                                                 
                            
                             ";
                            $durum = $baglanti->prepare($sql)->execute($satir);

                            if ($durum) {// Eğer veri eklendiyse eklendi yazmasını sağlıyoruz.
                                $sonId = $baglanti->lastInsertId();
                                echo $sonId . " id'li veri eklendi";
                            }


//Aynı işi yapar
//                                if ($baglanti->query("INSERT INTO cokluresim (foto, baslik, icerik) VALUES ('$dosya_adi','$baslik','$icerik')")) // Veri ekleme sorgumuzu yazıyoruz.
//                                {
//                                    echo "Veri Eklendi"; // Eğer veri eklendiyse eklendi yazmasını sağlıyoruz.
//                                } else {
//                                    echo "Hata oluştu";
//                                }
                        }
                    }
                }
            }


        }

    }

    ?>
</div>
<!-- ############################################################## -->
<!-- Veritabanına eklenmiş verileri sıralamak için önce üst kısmı hazırlayalım. -->
<div class="col-md-7">
    <table class="table">

        <tr>
            <th>No</th>
            <th>Foto</th>
           
            <th></th>
            <th></th>
        </tr>

        <!-- Şimdi ise verileri sıralayarak çekmek için PHP kodlamamıza geçiyoruz. -->

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

            <tr>
                <td><?php echo $id; // Yukarıda tanıttığımız gibi alanları dolduruyoruz. ?></td>
                
                <td><img width="150px" src="assets/cokluresim/<?php echo $foto ?>" alt=""></td>
                <input type="hidden" name="urun_id" value="<?php echo $urun_id ?>">
               
                <td><a href="sil3.php?id=<?php echo $id; ?>" class="btn btn-danger">Sil</a></td>
            </tr>

        <?php } // Tekrarlanacak kısım bittikten sonra PHP tagının içinde while döngüsünü süslü parantezi kapatarak sonlandırıyoruz.
        ?>

    </table>
</div>
</div>

<!-- Main content -->

<!-- /.content -->
<?php include 'include/footer.php'; ?>