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
$sorgu = $baglanti->prepare("SELECT * FROM makale Where id=:id");
$sorgu->execute(['id' => (int)$_GET["id"]]);
$sonuc = $sorgu->fetch();//sorgu çalıştırılıp veriler alınıyor
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
                        <img width="100px" src="images/<?php echo $sonuc['foto']; ?>" alt="">
                    </td>
                </tr>
                <tr>
                    <td>Başlık</td>
                    <td><input type="text" name="baslik" class="form-control"
                               value="<?php echo $sonuc['baslik']; // Veritabanından verileri çekip inputların içine yazdırıyoruz. ?>">
                    </td>
                </tr>
                <tr>
                    <td>İçerik</td>
                    <td><textarea name="icerik" class="form-control"><?php echo $sonuc['icerik']; ?></textarea></td>
                </tr>
                <tr>
                    <td>sıra</td>
                    <td><input type="number" name="sira" class="form-control" value="<?php echo $sonuc['sira']; ?>" > </td>
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
            $baslik = $_POST['baslik']; // Post edilen değerleri değişkenlere aktarıyoruz
            $icerik = $_POST['icerik'];
            $sira = $_POST['sira'];
            $hata = '';
            if ($_FILES["foto"]["name"] != "") {
                $foto = strtolower($_FILES['foto']['name']);
                if (file_exists('images/' . $foto)) {
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
                            copy($dosya, "images/" . $foto);
                            unlink('images/' . $sonuc["foto"]); //eski dosya siliniyor.
                        }
                    }
                }
            } else {
                //Eğer kullanıcı fotoğraf seçmedi ise veri tabanındaki resimi değiştirmiyoruz
                $foto = $sonuc["foto"];
            }

            if ($baslik <> "" && $icerik <> "" && $hata == "") { // Veri alanlarının boş olmadığını kontrol ettiriyoruz.
                //Değişecek veriler
                $satir = [
                    'id' => $_GET['id'],
                    'foto' => $foto,
                    'baslik' => $baslik,
                    'icerik' => $icerik,
                    'sira'=>$sira,
                ];
                // Veri güncelleme sorgumuzu yazıyoruz.
                $sql = "UPDATE makale SET foto=:foto, baslik=:baslik, icerik=:icerik, sira=:sira  WHERE id=:id;";
                $durum = $baglanti->prepare($sql)->execute($satir);

                if ($durum)
                {
                    header("location:anasayfa.php?=id"); // Eğer güncelleme sorgusu çalıştıysa index.php sayfasına yönlendiriyoruz.
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