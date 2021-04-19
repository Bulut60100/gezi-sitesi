<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>AFYONKARAHİSAR GALERİ</title>
<link rel="stylesheet" href="şgaleri.css" />
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
<p class="p">Afyonkarahisar Kalesi</p>
<img class="galeri" src="../şehirler/afyonkarahisar/afyonkale.jpg" />
<img class="galeri" src="../şehirler/afyonkarahisar/afyonkale1.jpg" />
<br><p class="p">Sultan Divani Mevlevihanesi</p>
<img class="galeri" src="../şehirler/afyonkarahisar/mevlevihane.jpg" />
<img class="galeri" src="../şehirler/afyonkarahisar/mevlevihane1.jpg" />
<br><p class="p">Ulu Camii</p>
<img class="galeri" src="../şehirler/afyonkarahisar/ulucamii.jpg" />
<img class="galeri" src="../şehirler/afyonkarahisar/ulucamii1.jpg" />

</div>

<?php
	}
?>
</body>
</html>