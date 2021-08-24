<?php 
include 'vt.php';
ini_set('max_execution_time',0);
if (!empty($_FILES)) {

 
	$uploads_dir = 'assets/cokluresim';

	@$tmp_name = $_FILES['file']["tmp_name"];

	@$name = $_FILES['file']["name"];

	$sayi1=rand(20000,30000);
	$sayi2=rand(20000,30000);
	$sayi3=rand(20000,30000);
	$sayilar=$sayi1.$sayi2.$sayi3;
	$resimyolu=$sayilar.$name;

  move_uploaded_file($tmp_name, "$uploads_dir/$resimyolu");


	$kaydet=$baglanti->prepare("INSERT INTO cokluresim SET
		urun_id=:urun_id,

		foto=:foto

		");

	$insert=$kaydet->execute(array(
		'urun_id' =>$_POST['id'],

		'foto' => $resimyolu

	));
	
}
