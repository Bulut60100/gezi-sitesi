<?php 
include("baglan.php");

if($_POST){
 
$kadi = $_POST['kullaniciadi'];
$sifre = $_POST['şifre'];

     if(!$kadi || !$sifre){
		 echo "<span style='color:red;'>kullanici adi veya sifre bos birakilamaz</span>";
		 }else{
			 

    $kullanicisor=$db->prepare("select * from uye where uye_kullanici=:kullanici  and uye_sifre=:sifre ");
    $kullanicisor->execute(array(
        'kullanici' => $kadi,
        'sifre' => $sifre
    ));
	$c = $kullanicisor->fetch(PDO::FETCH_ASSOC);

    $say=$kullanicisor->rowCount();
	
	if($say){
		$_SESSION["uye"] = $c["uye_kullanici"];
		$_SESSION["sifre"] = $c["uye_sifre"];
		$_SESSION["durum"] = $c["uye_durum"];
		
		header("location:giriss.php");
		
		}else{
			echo "<span style='color:red;'>kullanici adi veya sifre hatali</span>";
			}

		 }
	
}
 ?>