
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
                        <input type="file" name="foto"/>
                    </td>
                </tr>
                <tr>
                    <td>Başlık</td>
                    <td><input type="text" name="baslik" class="form-control"></td>
                </tr>
                <tr>
                    <td>tarih</td>
                    <td><textarea name="icerik" class="form-control"></textarea></td>
                </tr>
                <tr>
                    <td>sıra</td>
                    <td><input type="number" name="sira" class="form-control"></td>
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

            $baslik = $_POST['baslik']; // Sayfa yenilendikten sonra post edilen değerleri değişkenlere atıyoruz
            $icerik = $_POST['icerik'];
            $sira = $_POST['sira'];

            // Veri alanlarının boş olmadığını kontrol ettiriyoruz. başka kontrollerde yapabilirsiniz.
            if ($baslik <> "" && $icerik <> "" && isset($_FILES['foto'])) {

                if ($_FILES['foto']['error'] != 0) {
                    echo 'Dosya yüklenirken hata gerçekleşti lütfen daha sonra tekrar deneyiniz.';
                } else {

                    $dosya_adi = $_FILES['foto']['name'];
                    if (file_exists('assets/images/' . $dosya_adi)) {
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
                                copy($foto, 'assets/images/' . $dosya_adi);

                                echo 'Dosyanız upload edildi!';

                                //Eklencek veriler diziye ekleniyor
                                $satir = [
                                    'foto' => $dosya_adi,
                                    'baslik' => $baslik,
                                    'icerik' => $icerik,
                                    'sira'=>$sira,
                                ];

                                // Veri ekleme sorgumuzu yazıyoruz.
                                $sql = "INSERT INTO makale SET foto=:foto, baslik=:baslik, icerik=:icerik, sira=:sira";
                                $durum = $baglanti->prepare($sql)->execute($satir);

                                if ($durum) {// Eğer veri eklendiyse eklendi yazmasını sağlıyoruz.
                                    $sonId = $baglanti->lastInsertId();
                                    echo $sonId . " id'li veri eklendi";
                                }


//Aynı işi yapar
//                                if ($baglanti->query("INSERT INTO makale (foto, baslik, icerik) VALUES ('$dosya_adi','$baslik','$icerik')")) // Veri ekleme sorgumuzu yazıyoruz.
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
                <th>Başlık</th>
                <th>icerik</th>
                <th></th>
                <th></th>
                <th></th>
                <th>sira</th>
            </tr>

            <!-- Şimdi ise verileri sıralayarak çekmek için PHP kodlamamıza geçiyoruz. -->

            <?php
            
            $sorgu = $baglanti->prepare("SELECT * FROM makale order by sira");// Makale tablosundaki tüm verileri çekiyoruz.
            $sorgu->execute();

            while ($sonuc = $sorgu->fetch()) {

                $id = $sonuc['id']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
                $foto = $sonuc['foto'];
                $baslik = $sonuc['baslik'];
                $icerik = $sonuc['icerik'];
                $sira= $sonuc['sira'];

// While döngüsü ile verileri sıralayacağız. Burada PHP tagını kapatarak tırnaklarla uğraşmadan tekrarlatabiliriz. 
                ?>

                <tr>
                    <td><?php echo $id; // Yukarıda tanıttığımız gibi alanları dolduruyoruz. ?></td>
                    <td><img width="150px" src="assets/images/<?php echo $foto; ?>" alt=""></td>
                    <td><?php echo $baslik; ?></td>
                    <td><?php echo $icerik; ?></td>
                    <td><a href="detay.php?id=<?php echo $id; ?>" class="btn btn-info">detay</a></td>
                    <td><a href="duzenle.php?id=<?php echo $id; ?>" class="btn btn-primary">Düzenle</a></td>
                    <td><a href="sil.php?id=<?php echo $id; ?>" class="btn btn-danger">Sil</a></td>
                    <td><?php echo $sira; ?></td>
                </tr>

            <?php } // Tekrarlanacak kısım bittikten sonra PHP tagının içinde while döngüsünü süslü parantezi kapatarak sonlandırıyoruz.
            ?>

        </table>
    </div>
</div>

    <!-- Main content -->
    
    <!-- /.content -->
<?php include 'include/footer.php'; ?>
