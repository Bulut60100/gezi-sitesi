<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Gezi Notları</title>
<link rel="stylesheet" href="gezi notları.css" />
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
include("baglan3.php");
$islem = @$_GET["islem"];
switch ($islem){
	case "devam";
	
	$id = @$_GET["id"];
	
	$v = $db->prepare("select * from konular where konu_id=?");
	$v->execute(array($id));
	$x = $v->fetchAll(PDO::FETCH_ASSOC);
	$xx = $v->rowCount();
	if($xx){
		foreach($x as $m){
			?>
            
             <div class="devam">
    <h3><?php echo $m["konu_baslik"]; ?></h3>
    <h5>Ekleyen : <?php echo $m["konu_ekleyen"]; ?> </h5>
    <p><?php echo '<img src='.$m["konu_dosya"].' />'; ?></p>
    <p><?php echo $m["konu_aciklama"]; ?></p>
    
    </div>
    
            <h1 class="yorumbas">YORUMLAR</h1>
            
            <?php
			}
			//yorum liste
			
			$c = $db->prepare("select * from yorumlar where yorum_konu_id=?");
			$c->execute(array($id));
			
			$x = $c->fetchAll();
			$xx = $c->rowCount();
			if($xx){
				foreach($x as $b){
					?>
                    
                    <div class="yorumlar">
                    <h4>Ekleyen : <?php echo $b["yorum_ekleyen"]; ?></h4>
                    <p><?php echo $b["yorum_mesaj"]; ?></p>
                    </div>
                    
                    <?php
					}
				}else{
					echo "<p class='yorumhata'> Bu Konuya Hiç Yorum Yazılmamış İlk Yazan Sen Ol </p>";
					}
			
			
			//yorum liste bitiş
			// yorum başla
			
			if($_POST){
				
				$isim = $_POST["isim"];
				$mesaj = $_POST["mesaj"];
				$konuid = $_POST["konuid"];
				
				if(!$isim || !$mesaj){
					echo "<p class='yorumhata'>Lütfen Gerekli Alanları Doldurup Tekrar Deneyiniz </p>";
					$url = $_SERVER['HTTP_REFERER'];
					header ("refresh: 3; url=".$url."");
					}else{
				$c = $db->prepare("insert into yorumlar set
				
	
				yorum_ekleyen=?,
				yorum_mesaj=?,
				yorum_konu_id=?
				
				");
				
				$x = $c->execute(array($isim,$mesaj,$konuid));
				
				if($x){
					echo "<p class='yorumhata'>mesaj başrılı bir şekilde gönderildi</p>";
					$url = $_SERVER['HTTP_REFERER'];
					header ("refresh: 1; url=".$url."");
					}else{
						echo "<p class='yorumhata'>yorum gönderilirken bir hata oluştu</p>";
						}
					}
				}else{
					?>
                    <?php
					session_start();
					if(!$_SESSION){
						echo "<p class='yorumhata'>yorum yapabilmek için üye olmanız gerekmektedir</p>";
						}else{
					 ?>
                    <div class="yorum">
                    <h2>Yorum Gönder</h2>
                    <form action="" method="post" enctype="multipart/form-data">
                    <table cellpadding="5" cellspacing="5">
                    <tr>
                    <td>isim</td>
                    <td><input type="text" name="isim" /></td>
                    </tr>
                    <tr>
                    <td></td>
                    <td><input type="hidden" name="konuid" value="<?php echo $m['konu_id']; ?>" /></td>
                    </tr>
                    <tr>
                    <td>mesaj</td>
                    <td><textarea name="mesaj" cols="50" rows="10"></textarea></td>
                    </tr>
                    <tr>
                    <td></td>
                    <td><input type="submit" value="gönder" /></td>
                    </tr>
                    </table>
                    </form>
                    </div>
                    <?php
						}
					?>
                    <?php
					}
			
			//yorum bitiş
		}else{
			echo "böyle bir konu bulunmuyor yada silinmiş";
			}
	
	break;
	
	default:
	//sayfalama
	$sayfa = intval(@$_GET["sayfa"]);
   if(!$sayfa){
	   $sayfa = 1;
   }
   $v = $db->prepare("select * from konular where konu_durum=1");
   $v->execute(array());
   $toplam = $v->rowCount();
   $limit = 3;
   $goster = $sayfa*$limit-$limit; 
   $sayfa_sayisi = ceil($toplam/$limit);
   $forlimit = 2;
	//sayfalama bitiş
$v = $db->prepare("select * from konular where konu_durum=1 order by konu_id desc limit $goster,$limit");
$v->execute(array());
$x = $v->fetchAll(PDO::FETCH_ASSOC);

foreach($x as $m){
	
	//yorum sayısı
	
	       $v = $db->prepare("select * from yorumlar where yorum_konu_id=?");
		   $v->execute(array($m["konu_id"]));
		   $z = $v->rowCount();
	
	//yorum sayısı bitiş
	
	?>
    
    <div class="konu">
    <h3><?php echo $m["konu_baslik"]; ?></h3>
    <h5>ekleyen : <?php echo $m["konu_ekleyen"]; ?> <span class="sayma"><?php echo "Yorum Sayısı : $z"; ?></span> </h5>
     <p><?php echo '<img src='.$m["konu_dosya"].' />'; ?></p>
    <p><?php echo substr ($m["konu_aciklama"],0,1000); ?></p>
    <div class="x"><a href="gezi notlari.php?islem=devam&id=<?php echo $m["konu_id"]; ?>">Yorumlar</a>
    </div>
    </div>
    <?php
	}
	//sayfalama linkleri
	?>
    <div class="sayfalama">
    <?php
		for($i = $sayfa - $forlimit; $i<$sayfa + $forlimit +1; $i++){
		
		if($i>0 && $i<= $sayfa_sayisi){
			
			if($i == $sayfa){
				
				
				echo "<span class='aktif'>".$i."</span>";
				
				
			}else{
				
				echo "<span class='sayfa'><a href='gezi notlari.php?sayfa=".$i."'>".$i."</a></span>";
				
				
			}
			
		}
		
		
	}
	if($sayfa != $sayfa_sayisi){
	echo "<span class='sayfa'><a href='gezi notlari.php?sayfa=".$sayfa_sayisi."'>son</a></span>";
	}
	?>
    </div>
    <?php
	break;
}

?>

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
<div class="altalt3"><a href="https://m.facebook.com/Gezi-Land-353997415242340/" target="_blank" class="altalt3">•Facebook</a><br><a href="https://www.instagram.com/gezi_land/" target="_blank" class="altalt3">•İnstagram</a><br><a href="iletişim.html" class="altalt3">•E-Posta</a></div>

<div><a class="color" style="text-decoration:none" href="kayıt.html">•Üye Kayıt</a><br><a class="color" style="text-decoration:none" href="giriss.php">•Üye Girişi</a></div>
</body>
</html>
