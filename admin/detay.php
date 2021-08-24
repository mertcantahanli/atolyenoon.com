
<?php include 'include/header.php'; ?>

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
    <form action="" method="post" enctype="multipart/form-data">

        <table class="table">
            <tr>
                <td>Kapak Foto</td>
                <td>
                    <!--form elemanı olarak file kullanıyoruz -->
                    <input type="file" name="foto" />
                </td>
            </tr>
            <tr>
                <td>proje yeri</td>
                <td><input type="text" name="projeyeri" class="form-control"></td>
            </tr>
            <tr>
                <td>projeofisi</td>
                <td><input type="text" name="projeofisi" class="form-control"></td>
            </tr>
            <tr>
                <td>proje tipi</td>
                <td><input type="text" name="projetipi" class="form-control"></td>
            </tr>
            <tr>
                <td>proje tipi grubu</td>
                <td><input type="text" name="projetipigrubu" class="form-control"></td>
            </tr>
            <tr>
                <td>tasarım ekibi</td>
                <td><input type="text" name="tasarimekibi" class="form-control"></td>
            </tr>
            
            <tr>
                <td></td>
                <td><input class="btn btn-primary" type="submit" value="Ekle"></td>
            </tr>

        </table>

    </form>

    <!-- Öncelikle HTML düzenimizi oluşturuyoruz. Daha sonra girdiğimiz verileri veritabanına eklemesi için PHP kodlarına geçiyoruz. -->

    <?php
    include 'vt.php';
    if ($_POST) { // Sayfada post olup olmadığını kontrol ediyoruz.
         $gelen_id=$_GET["id"]  ;
        $projeyeri = $_POST['projeyeri']; // Sayfa yenilendikten sonra post edilen değerleri değişkenlere atıyoruz
        $projeofisi = $_POST['projeofisi'];
        $projetipi = $_POST['projetipi'];
        $projetipigrubu = $_POST['projetipigrubu'];
        $tasarimekibi = $_POST['tasarimekibi'];
        // Veri alanlarının boş olmadığını kontrol ettiriyoruz. başka kontrollerde yapabilirsiniz.
        if ($gelen_id <> "" && $projeyeri <> "" && $projeofisi <> "" && $projetipi <> "" && $projetipigrubu <> "" && $tasarimekibi<> "" && isset($_FILES['foto'])) {

            if ($_FILES['foto']['error'] != 0) {
                echo 'Dosya yüklenirken hata gerçekleşti lütfen daha sonra tekrar deneyiniz.';
            } else {

                $dosya_adi = $_FILES['foto']['name'];
                if (file_exists('assets/kapakfoto/' . $dosya_adi)) {
                    echo "$dosya_adi diye bir dosya var";
                } else {
                    $boyut = $_FILES['foto']['size'];
                    if ($boyut > (1024 * 1024 * 35)) {
                        echo 'Dosya boyutu 35MB den büyük olamaz.';
                    } else {
                        $dosya_tipi = $_FILES['foto']['type'];
                        $dosya_uzanti = explode('.', $dosya_adi);
                        $dosya_uzanti = $dosya_uzanti[count($dosya_uzanti) - 1];

                        if (!in_array($dosya_tipi, ['image/png', 'image/jpeg']) || !in_array($dosya_uzanti, ['png', 'jpg'])) {
                            //if (($dosya_tipi != 'image/png' || $dosya_uzanti != 'png' )&&( $dosya_tipi != 'image/jpeg' || $dosya_uzanti != 'jpg')) {
                            echo 'Hata, dosya türü JPEG veya PNG olmalı.';
                        } else {
                            $foto = $_FILES['foto']['tmp_name'];
                            copy($foto, 'assets/kapakfoto/' . $dosya_adi);

                            echo 'Dosyanız upload edildi!';

                            //Eklencek veriler diziye ekleniyor
                            $satir = [
                                'gelen_id'=>$gelen_id,
                                'foto' => $dosya_adi,
                                'projeyeri' => $projeyeri,
                                'projeofisi' => $projeofisi,
                                'projetipi' => $projetipi,
                                'projetipigrubu' => $projetipigrubu,
                                'tasarimekibi' =>$tasarimekibi,
                            ];

                            // Veri ekleme sorgumuzu yazıyoruz.
                            
                            $sql = "INSERT INTO detay  SET 
                                                gelen_id=:gelen_id,
                                                foto=:foto,
                                                projeyeri=:projeyeri,
                                                projeofisi=:projeofisi,
                                                projetipi=:projetipi,
                                                projetipigrubu=:projetipigrubu,
                                                tasarimekibi=:tasarimekibi ";
                            $durum = $baglanti->prepare($sql)->execute($satir);

                            if ($durum) {// Eğer veri eklendiyse eklendi yazmasını sağlıyoruz.
                                $sonId = $baglanti->lastInsertId();
                                echo $sonId . " id'li veri eklendi";
                            }


//Aynı işi yapar
//                                if ($baglanti->query("INSERT INTO detay (foto, projeyeri, projeofisi) VALUES ('$dosya_adi','$projeyeri','$projeofisi')")) // Veri ekleme sorgumuzu yazıyoruz.
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
            <th>proje yeri</th>
            <th>proje ofisi</th>
            <th>proje tipi</th>
            <th>proje tipi grubu</th>
            <th>tasarım ekibi</th>
        </tr>

        <!-- Şimdi ise verileri sıralayarak çekmek için PHP kodlamamıza geçiyoruz. -->

        <?php

     
        
          
    
$sorgu = $baglanti->prepare("SELECT * FROM detay Where gelen_id=:gelen_id");// detay tablosundaki tüm verileri çekiyoruz.
$sorgu->execute(
  ['gelen_id' => $_GET['id']
  
  ]);
 
$sonuc = $sorgu->fetch(PDO::FETCH_ASSOC);
if (empty($sonuc['id'])) {
    $sonuc['id']='';
    $sonuc['projeyeri']='';
    $sonuc['projeofisi']='';
    $sonuc['projetipi']='';
    $sonuc['projetipigrubu']='';
    $sonuc['tasarimekibi']='';

}else {
    


// While döngüsü ile verileri sıralayacağız. Burada PHP tagını kapatarak tırnaklarla uğraşmadan tekrarlatabiliriz. 
    ?>


            <tr>
                <td><?php echo $sonuc['id']; // Yukarıda tanıttığımız gibi alanları dolduruyoruz. ?></td>
                <td><img width="150px" src="assets/kapakfoto/<?php echo $sonuc['foto']; ?>" alt=""></td>
                <td><?php echo $sonuc['projeyeri'] ?></td>
                <td><?php echo $sonuc['projeofisi'] ?></td>
                <td><?php echo $sonuc['projetipi']?></td>
                <td><?php echo $sonuc['projetipigrubu'] ?></td>
                <td><?php echo $sonuc['tasarimekibi'] ?></td>
                
                <td><a href="cokluresim.php?id=<?php echo $sonuc['id']; ?>" class="btn btn-info">Çoklu resim</a></td>
                <td><a href="düzenle2.php?id=<?php echo $sonuc['id'];?>" class="btn btn-primary">Düzenle</a></td>
               
            </tr>

    <?php } ?>

    </table>
</div>
</div>

<!-- Main content -->

<!-- /.content -->
<?php include 'include/footer.php'; ?>
