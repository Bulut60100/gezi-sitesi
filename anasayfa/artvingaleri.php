<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ARTVİN GALERİ</title>
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
<p class="p">Atatepe</p>
<img class="galeri" src="../şehirler/artvin/atatepe.jpg" />
<img class="galeri" src="../şehirler/artvin/atatepe1.jpg" />
<img class="galeri" src="../şehirler/artvin/atatepe2.jpg" />
<br><p class="p">Kafkasör Yaylası</p>
<img class="galeri" src="../şehirler/artvin/kafkasör.jpg" />
<img class="galeri" src="../şehirler/artvin/kafkasör1.jpg" />
<img class="galeri" src="../şehirler/artvin/kafkasör2.jpg" />
<br><p class="p">Karagöl Sahara Milli Parkı</p>
<img class="galeri" src="../şehirler/artvin/millipark.jpg" />
<img class="galeri" src="../şehirler/artvin/millipark1.jpg" />
<img class="galeri" src="../şehirler/artvin/millipark2.jpg" />

</div>

<?php
	}
?>
</body>
</html>
