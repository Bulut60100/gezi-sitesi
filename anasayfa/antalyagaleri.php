<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ANTALYA GALERİ</title>
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
<p class="p">Kaleiçi</p>
<img class="galeri" src="../şehirler/antalya/kaleiçi.jpg" />
<img class="galeri" src="../şehirler/antalya/kaleiçi1.jpg" />
<br><p class="p">Olympos Antik Kent</p>
<img class="galeri" src="../şehirler/antalya/olympos.jpg" />
<img class="galeri" src="../şehirler/antalya/olympos1.jpg" />
<img class="galeri" src="../şehirler/antalya/olympos2.jpg" />
<br><p class="p">Yanartaş</p>
<img class="galeri" src="../şehirler/antalya/yanartaş.jpg" />
<img class="galeri" src="../şehirler/antalya/yanartaş1.jpg" />
<img class="galeri" src="../şehirler/antalya/yanartaş2.jpg" />

</div>

<?php
	}
?>
</body>
</html>
