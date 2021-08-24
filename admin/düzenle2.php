<?php
include("vt.php"); // veritabanı bağlantımızı sayfamıza ekliyoruz. 
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Veritabanı İşlemleri</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<?php
//id değeri ile düzenlenecek verileri veritabanından alacak sorgu
$sorgu = $baglanti->prepare("SELECT * FROM detay Where id=:id");
$sorgu->execute(['id' => (int)$_GET["id"]]);
$sonuc = $sorgu->fetch(PDO::FETCH_ASSOC);//sorgu çalıştırılıp veriler alınıyor
?>

<div class="container">
    <div class="col-md-6">

        <form action="" method="post" enctype="multipart/form-data">
            <table class="table">
                <tr>
                    <td>Foto</td>
                    <td>
                        <!--form elemanı olarak file kullanıyoruz -->
                        <input type="file" name="foto"/>
                        <img width="100px" src="assets/kapakfoto/<?php echo $sonuc['foto']; ?>" alt="">
                    </td>
                </tr>
                <tr>
                    <td>proje yeri</td>
                    <td><input type="text" name="projeyeri" class="form-control"value="<?php echo $sonuc['projeyeri']; // Veritabanından verileri çekip inputların içine yazdırıyoruz. ?>">
                    </td>
                </tr>
                <tr>
                    <td>proje ofisi</td>
                    <td><input type="text" name="projeofisi" class="form-control"value="<?php echo $sonuc['projeofisi']; // Veritabanından verileri çekip inputların içine yazdırıyoruz. ?>">
                    </td>
                </tr>
                <tr>
                    <td>proje tipi</td>
                    <td><input type="text" name="projetipi" class="form-control"value="<?php echo $sonuc['projetipi']; // Veritabanından verileri çekip inputların içine yazdırıyoruz. ?>">
                    </td>
                </tr>
                <tr>
                    <td>proje tipi grubu</td>
                    <td><input type="text" name="projetipigrubu" class="form-control"value="<?php echo $sonuc['projetipigrubu']; // Veritabanından verileri çekip inputların içine yazdırıyoruz. ?>">
                    </td>
                </tr>
                <tr>
                    <td>tasarım ekibi</td>
                    <td><input type="text" name="tasarimekibi" class="form-control"value="<?php echo $sonuc['tasarimekibi']; // Veritabanından verileri çekip inputların içine yazdırıyoruz. ?>">
                    </td>
                </tr>
                
                <tr>
                    <td></td>
                    <td><input type="submit" class="btn btn-primary" value="Kaydet"></td>
                </tr>
            </table>
        </form>
    </div>
    <div>
        <?php

        if ($_POST) { // Post olup olmadığını kontrol ediyoruz.
            $projeyeri = $_POST['projeyeri']; // Sayfa yenilendikten sonra post edilen değerleri değişkenlere atıyoruz
        $projeofisi = $_POST['projeofisi'];
        $projetipi = $_POST['projetipi'];
        $projetipigrubu = $_POST['projetipigrubu'];
        $tasarimekibi = $_POST['tasarimekibi'];
            $hata = '';
            if ($_FILES["foto"]["name"] != "") {
                $foto = strtolower($_FILES['foto']['name']);
                if (file_exists('assets/images/' . $foto)) {
                    $hata = "$foto diye bir dosya var";
                } else {
                    $boyut = $_FILES['foto']['size'];
                    if ($boyut > (1024 * 1024 * 2)) {
                        $hata = 'Dosya boyutu 2MB den büyük olamaz.';
                    } else {
                        $dosya_tipi = $_FILES['foto']['type'];
                        $dosya_uzanti = explode('.', $foto);
                        $dosya_uzanti = $dosya_uzanti[count($dosya_uzanti) - 1];

                        if (!in_array($dosya_tipi, ['image/png', 'image/jpeg']) || !in_array($dosya_uzanti, ['png', 'jpg'])) {
                            //if (($dosya_tipi != 'image/png' || $dosya_uzanti != 'png' )&&( $dosya_tipi != 'image/jpeg' || $dosya_uzanti != 'jpg')) {
                            $hata = 'Hata, dosya türü JPEG veya PNG olmalı.';
                        } else {
                            $dosya = $_FILES["foto"]["tmp_name"];
                            copy($dosya, "assets/images/" . $foto);
                            unlink('assets/images/' . $sonuc["foto"]); //eski dosya siliniyor.
                        }
                    }
                }
            } else {
                //Eğer kullanıcı fotoğraf seçmedi ise veri tabanındaki resimi değiştirmiyoruz
                $foto = $sonuc["foto"];
            }

            if ($projeyeri <> "" && $projeofisi <> "" && $projetipi <> "" && $projetipigrubu <> "" && $tasarimekibi<> "" && $hata == "") { // Veri alanlarının boş olmadığını kontrol ettiriyoruz.
                //Değişecek veriler
                $satir = [
                    'id' => $_GET['id'],
                    'foto' => $foto,
                    'projeyeri' => $projeyeri,
                                'projeofisi' => $projeofisi,
                                'projetipi' => $projetipi,
                                'projetipigrubu' => $projetipigrubu,
                                'tasarimekibi' =>$tasarimekibi,
                ];
                // Veri güncelleme sorgumuzu yazıyoruz.
                $sql = "UPDATE detay SET foto=:foto,
                projeyeri=:projeyeri,
                projeofisi=:projeofisi,
                projetipi=:projetipi,
                projetipigrubu=:projetipigrubu,
                tasarimekibi=:tasarimekibi  WHERE id=:id;";
                $durum = $baglanti->prepare($sql)->execute($satir);

                if ($durum)
                {
                    header("location:detay.php?=id"); // Eğer güncelleme sorgusu çalıştıysa index.php sayfasına yönlendiriyoruz.
                } else {
                    echo 'Düzenleme hatası oluştu: '; // id bulunamadıysa veya sorguda hata varsa hata yazdırıyoruz.
                }
            } else {
                echo 'Hata oluştu: ' . $hata; // dosya hatası ve form elemanlarının boş olma durumunua göre hata döndürüyoruz.
            }
        }
        ?>
</body>
</html>