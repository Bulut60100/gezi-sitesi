<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Konu Ekle</title>
<link rel="stylesheet" href="gezi notları.css">
</head>

<body>
<div class="sablon">
<div class="logo"><img src="../img/logo.jpg" height="150" width="200"></div>
<div class="resim"><img src="../img/türkiye.jpg" height="150" width="680"></div>
<div class="menu">
<ul>
<li><a href="../index.html"><font color="#000000" size="+1">Anasayfa</a></li>
<li><a href="gezi notlari.php"><font color="#000000" size="+1">Gezi Notları</a></li>
<li><a href="şehirler.html"><font color="#000000" size="+1">Şehirler</a></li>
<li><a href="galeri.php"><font color="#000000" size="+1">Galeri</a></li>
<li><a href="iletişim.html"><font color="#000000" size="+1">İletişim</a></li>
</ul>
</div>
<div class="sosyal">
<a href="https://m.facebook.com/Gezi-Land-353997415242340/" target="_blank"><img src="../img/facebook.jpg" width="45" height="47" /></a>
<a href="https://www.instagram.com/gezi_land/" target="_blank"><img src="../img/instagram.jpg" width="45" height="47" /></a>
<a href="giriss.php"><img src="../img/user.png" width="45" height="47" /></a>
</div>
</div>
<?php
include("baglan3.php");
?>
<?php
session_start();

if($_SESSION){
	
	if($_POST){
		if($_FILES["dosya"]["size"]>700000){
			echo "<h2 class='dikkat'>dosya boyutu 1mb den büyük olamaz</h2>";
			}else{
				$dosya = $_FILES["dosya"]["type"];
		if($dosya = "image/jpeg" || $dosya == "image/png" || $dosya == "image/gif" ){
		$baslik = strip_tags($_POST["baslik"]);
		$dosyaadi = $_FILES["dosya"]["name"];
		$uret= array("a","b","c","d","e");
		$uzanti = substr($dosyaadi,-4,4);
		$sayitut = rand(1,999999);
		$yeniad = "../img/".$uret[rand(0,4)].$sayitut.$uzanti;
		$aciklama = strip_tags($_POST["aciklama"]);
		if(move_uploaded_file($_FILES["dosya"]["tmp_name"],$yeniad)){
			
		if(!$baslik || !$aciklama){
			echo "<h2 class='dikkat'>Lütfen Boş Alan Bırakmayınız Yönlendiriliyorsunuz</h2>";
			header("refresh: 2; url=konuekle.php");
			}else{
				$insert = $db->prepare("insert into konular set
				
	            konu_ekleyen=?,
				konu_baslik=?,
				konu_dosya=?,
				konu_aciklama=?
				
				");
				$kayit = $insert->execute(array($_SESSION["uye"],$baslik,$yeniad,$aciklama));
				if($kayit){
					echo "<h2 class='dikkat'>Konu Kaydedildi Onaylandıktan Sonra Yayınlanacaktır Yönderiliyorsunuz</h2>";
					header("refresh: 4; url=gezi notlari.php");
					}else{
						echo "<h2 class='dikkat'>Konu Eklerken Bir Hata Oluştu Lütfen Yeniden Deneyiniz Yönlendiriliyorsunuz</h2>";
						header("refresh: 2; url=konuekle.php");
						}
				}
		}else{
			echo "<h2 class='dikkat'>dosya jpg,png veya gif olmalıdır lütfen tekrar deneyiniz yönlendiriliyorsunuz</h2>";
			}
		}
			}
		}else{
			
			?>
            <div class="konuekle">
            <form action="" method="post" enctype="multipart/form-data">
            <h2>Gezi Notu Ekle</h2>
            <ul>
            <li>Şehir Adı</li>
            <li><input type="text" name="baslik" /></li>
            <li>Resim Ekle</li>
            <li><input type="file" name="dosya" /></li>
            <li>Açıklama</li>
            <li><textarea name="aciklama" id="" cols="45" rows="10"></textarea></li>
            <li><button type="submit">Konu Ekle</button></li>
            </ul>
            </form>
            </div>
			<?php
			}
	
	}else{
		echo "<h2 class='dikkat'>Üye Olmadan Konu Ekleyemezsiniz</h2>";
		exit;
	

?>
<div class="altkisim">
<div class="altüst">
<div class="altsol">
<div class="ustyazi">Menü</div>
<div class="ustyazi">Hakkımızda</div>
<div class="ustyazi">İletişim</div>
<div class="ustyazi">Üye</div>
</div>
<div class="altsag"></div>
</div>
<div class="altalt">
<div><a href="index.html" class="altyazi">•Anasayfa</a></div>
<div><a href="gezi notları.html" class="altyazi">•Gezi Notları</a></div>
<div><a href="şehirler.html" class="altyazi">•Şehirler</a></div>
<div><a href="galeri.html" class="altyazi">•Galeri</a></div>
<div><a href="iletişim.html" class="altyazi">•İletişim</a></div>
</div>
<div class="altalt2">•Telefon: 0534 977 05 63<br>•Adres: Akdeniz Mahallesi, Alparslan Türkeş Blv. No:201, 33770 Erdemli/Mersin</div>
<div class="altalt3"><a href="https://m.facebook.com/Gezi-Land-353997415242340/" target="_blank" class="altalt3">•Facebook</a><br><a href="https://www.instagram.com/gezi_land/" target="_blank" class="altalt3">•İnstagram</a><br><a href="iletişim.html" class="altalt3">•E-Posta</a></div>

<div><a class="color" style="text-decoration:none" href="kayıt.html">•Üye Kayıt</a><br><a class="color" style="text-decoration:none" href="giriş.html">•Üye Girişi</a></div>
<?php
	}
?>
</body>
</html>