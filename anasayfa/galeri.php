<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Galeri</title>
<link rel="stylesheet" href="galeri.css" />
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
<?php
session_start();
if(!$_SESSION){
	echo("<span style=' color:red; font-size:25px;'>Galeriye Ulaşmak İçin Giriş Yapmanız Gerekmektedir...</span>");
	}else{
	?>
<?php
include("giris.php");
?>
<div class="sehir">
<a href="adanagaleri.php"><img src="../şehirler/adana/adana1.jpg" width="285" height="200" /></a>
</div>
<div class="sehir2">
<a href="adiyamangaleri.php"><img src="../şehirler/adıyaman/adıyaman1.jpg" width="285" height="200" /></a>
</div>
<div class="sehir2">
<a href="afyonkarahisargaleri.php"><img src="../şehirler/afyonkarahisar/afyonkarahisar1.jpg" width="285" height="200" /></a>
</div>
<div class="sehir">
<a href="agrigaleri.php"><img src="../şehirler/ağrı/ağrı1.jpg" width="285" height="200" /></a>
</div>
<div class="sehir2">
<a href="aksaraygaleri.php"><img src="../şehirler/aksaray/aksaray1.jpg" width="285" height="200" /></a>
</div>
<div class="sehir2">
<a href="amasyagaleri.php"><img src="../şehirler/amasya/amasya1.jpg" width="285" height="200" /></a>
</div>
<div class="sehir">
<a href="ankaragaleri.php"><img src="../şehirler/ankara/ankara1.jpg" width="285" height="200" /></a>
</div>
<div class="sehir2">
<a href="antalyagaleri.php"><img src="../şehirler/antalya/antalya1.jpg" width="285" height="200" /></a>
</div>
<div class="sehir2">
<a href="ardahangaleri.php"><img src="../şehirler/ardahan/ardahan1.jpg" width="285" height="200" /></a>
</div>
<div class="sehir">
<a href="artvingaleri.php"><img src="../şehirler/artvin/artvin1.jpg" width="285" height="200" /></a>
</div>
<div class="sehir2">
<a href="aydingaleri.php"><img src="../şehirler/aydın/aydın1.jpg" width="285" height="200" /></a>
</div>
<div class="sehir2">
<a href="balikesirgaleri.php"><img src="../şehirler/balıkesir/balıkesir1.jpg" width="285" height="200" /></a>
</div>
<div class="sehir">
<a href="bartingaleri.php"><img src="../şehirler/bartın/bartın1.jpg" width="285" height="200" /></a>
</div>
<div class="sehir2">
<a href="batmangaleri.php"><img src="../şehirler/batman/batman1.jpg" width="285" height="200" /></a>
</div>
<div class="sehir2">
<a href="bayburtgaleri.php"><img src="../şehirler/bayburt/bayburt1.jpg" width="285" height="200" /></a>
</div>

</div>
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
<div><a href="../index.html" class="altyazi">•Anasayfa</a></div>
<div><a href="gezi notlari.php" class="altyazi">•Gezi Notları</a></div>
<div><a href="şehirler.html" class="altyazi">•Şehirler</a></div>
<div><a href="galeri.php" class="altyazi">•Galeri</a></div>
<div><a href="iletişim.html" class="altyazi">•İletişim</a></div>
</div>
<div class="altalt2">•Telefon: 0534 977 05 63<br>•Adres: Akdeniz Mahallesi, Alparslan Türkeş Blv. No:201, 33770 Erdemli/Mersin</div>
<div class="altalt3"><a href="https://m.facebook.com/Gezi-Land-353997415242340/" target="_blank" class="altalt3">•Facebook</a><br><a href="" class="altalt3">•İnstagram</a><br><a href="iletişim.html" class="altalt3">•E-Posta</a></div>

<div><a class="color" style="text-decoration:none" href="kayıt.html">•Üye Kayıt</a><br><a class="color" style="text-decoration:none" href="giriss.php">•Üye Girişi</a></div>
<?php
	}
?>
</body>
</html>