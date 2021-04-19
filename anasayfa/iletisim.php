<?php 
include "baglan2.php";

        // Form Gönderme Kontrolü 
        if($_POST){
        
            // Formdan Gelen Kayıtlar
            $ad        =    $_POST["ad"];
            $soyad    =    $_POST["soyad"];
			$email    =    $_POST["email"];
			$tel    =    $_POST["tel"];
			$ulas    =    $_POST["ulas"];
			$aciklama    =    $_POST["aciklama"];
            
            // Veritabanına Ekleme
            $ekle        =    mysql_query("insert into form (ad,soyad,email,tel,ulas,aciklama) values ('$ad','$soyad','$email','$tel','$ulas','$aciklama')");
            
            // Sorun Oluşmuşmu testi 
            if($ekle){
                echo"<div style='border:1px solid #ddd; width:500px;height:20px;margin:5px;padding:10px;position:relative;top:200px;left:400px;font-size:20px;background:green;'>Form Gönderme Başarılı</div>";

header("refresh: 2; url=giriss.php");
            }else{
                echo "Bir Sorun Oluştu";
            }
        }
    ?>