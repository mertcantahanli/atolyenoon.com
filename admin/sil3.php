<?php

if ($_GET) {

    include("vt.php"); // veritabanı bağlantımızı sayfamıza ekliyoruz.

    $sorgu = $baglanti->prepare("SELECT * FROM cokluresim Where id=:id");
    $sorgu->execute(['id' => (int)$_GET["id"]]);
    
    $gelenid=$_GET['urun_id'];
    $sonuc = $sorgu->fetch();//sorgu çalıştırılıp veriler alınıyor
    unlink('assets/cokluresim/' . $sonuc["foto"]); //eski dosya siliniyor.

    

    // id'si seçilen veriyi silme sorgumuzu yazıyoruz.
    $where = ['id' => (int)$_GET['id']];
    $durum = $baglanti->prepare("DELETE FROM cokluresim WHERE id=:id")->execute($where);
    
    if ($durum) {
        header("location:cokluresim.php?id=$gelenid"); // Eğer sorgu çalışırsa index.php sayfasına gönderiyoruz.
    }
}

?>