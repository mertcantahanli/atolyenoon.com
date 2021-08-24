<?php

if ($_GET) {

    include("vt.php"); // veritabanı bağlantımızı sayfamıza ekliyoruz.

    $sorgu = $baglanti->prepare("SELECT * FROM detay Where id=:id");
    $sorgu->execute(['id' => (int)$_GET["id"]]);
    $sonuc = $sorgu->fetch();//sorgu çalıştırılıp veriler alınıyor
    unlink('assets/kapakfoto/' . $sonuc["foto"]); //eski dosya siliniyor.

    // id'si seçilen veriyi silme sorgumuzu yazıyoruz.
    $where = ['id' => (int)$_GET['id']];
    $durum = $baglanti->prepare("DELETE FROM detay WHERE id=:id")->execute($where);

    if ($durum) {
        header("location:detay.php"); // Eğer sorgu çalışırsa index.php sayfasına gönderiyoruz.
    }
}

?>