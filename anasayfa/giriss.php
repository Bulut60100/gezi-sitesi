<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Kullanıcı Girişi</title>
<link rel="stylesheet" href="giriş.css" />
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
if($_SESSION){
	?>
	<div class="giriş">
<div class="ust">
Üye Paneli
</div>
<div class="alt">
<ul>
<li><?php echo "<strong>  Hoşgeldiniz   </strong>".$_SESSION["uye"];  ?></li>
<?php
if($_SESSION["durum"]==1){
	echo '<li><a href="admin.php">admin paneli</a></li>';
	}
?>
<li><a href="konuekle.php" /> Gezi Notu Ekle </a></li>
<li><a href="cikis.php" /> çıkış yap </a></li>
</ul>
</div>
</div>
</div>
<?php
	}else{
?>			
<div class="giriş">
<div class="ust">
GİRİŞ
</div>
<?php
include("giris.php");
?>
<div class="alt">
	<form action="" method="post">
<p class="text">Kullanıcı adı</p>
<input type="text" name="kullaniciadi" class="textbox" />
<p class="text">Şifre</p>
<input type="password" name="şifre"  class="textbox" />
<input type="submit" name="buton" class="button" value="Giriş" />
<p><a href="kayıt.html" /> Kayıt Ol </a></p>
</form>
</div>
</div>
</div>
<?php
}
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
<div><a href="../index.html" class="altyazi">•Anasayfa</a></div>
<div><a href="gezi notlari.php" class="altyazi">•Gezi Notları</a></div>
<div><a href="şehirler.html" class="altyazi">•Şehirler</a></div>
<div><a href="galeri.php" class="altyazi">•Galeri</a></div>
<div><a href="iletişim.html" class="altyazi">•İletişim</a></div>
</div>
<div class="altalt2">•Telefon: 0534 977 05 63<br>•Adres: Akdeniz Mahallesi, Alparslan Türkeş Blv. No:201, 33770 Erdemli/Mersin</div>
<div class="altalt3"><a href="https://m.facebook.com/Gezi-Land-353997415242340/" target="_blank" class="altalt3">•Facebook</a><br><a href="" class="altalt3">•İnstagram</a><br><a href="iletişim.html" class="altalt3">•E-Posta</a></div>

<div><a class="color" style="text-decoration:none" href="kayıt.html">•Üye Kayıt</a><br><a class="color" style="text-decoration:none" href="giriss.php">•Üye Girişi</a></div>
</body>
</html>
