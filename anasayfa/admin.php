<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin paneli</title>
<link rel="stylesheet" href="stil.css" />
</head>

<body>
<?php
session_start();

if($_SESSION){
	
include("baglan3.php");
	
	if($_SESSION["durum"]==1){
		?>
        
        <div class="header">
        <img src="../img/logo.jpg" width="223" height="189" />
        <img src="../img/türkiye.jpg" width="1075" height="189" />
        <h3>Admin Paneline Hoşgeldiniz <span><?php  echo $_SESSION["uye"];  ?></span>
        <span style="float:right"><a href="../index.html" style="text-decoration:none">Siteyi Görüntüle</a></span></h3>
</div>
        <div class="genel">
        <div class="amenu">
        <ul>
        <li><a href="admin.php?do=konu">konu</a></li>
        <li><a href="admin.php?do=uye">uyeler</a></li>
        <li><a href="admin.php?do=yorum">yorumlar</a></li>
        </ul>
        </div>
        <div class="icerik">
        <?php
		
		$do = @$_GET["do"];
		
		switch($do){
			case"konu";
			$v = $db->prepare("select * from konular order by konu_id desc");
			$v->execute(array());
			$c = $v->fetchAll(PDO::FETCH_ASSOC);
			$x = $v->rowCount();
			?>
            <h2>konular <span style="float:right;"><a href="?do=konu_ekle">konu ekle</a></span></h2>
            <div class="adminkonu">
            <table cellpadding="0" cellspacing="0">
            <thead>
            <tr><th>Konu Basliklari</th><th>Resim</th><th>Konu Onayları</th><th>İşlemler</th></tr>
            </thead>
            <?php
			if($x){
				foreach($c as $m){
					?>
                    <tbody>
            <tr><td width="300px"><?php echo $m["konu_baslik"]; ?></td>
            <td width="300px"><?php echo $m["konu_dosya"]; ?></td>
            <td width="250px"><?php 
			if($m["konu_durum"] == 1){
				echo '<span style="color:green">onaylı</span>';
				}else{
					echo '<span style="color:red">onaylı değil</span>';
					}
			 ?></td><td width="250px" align="center"><a onClick="return confirm('Konuyu Silmek İstediğinize Eminmisiniz');" href="?do=konu_sil&id=<?php echo $m["konu_id"]; ?>"> Sil </a><a href="?do=konu_duzenle&id=<?php echo $m["konu_id"]; ?>"> duzenle </a></td></tr>
            </tbody>
                    <?php
					}
				}else{
					echo '<tr><td width="1300" colspan="4"><h3 class="admindikkat">henüz siteye hiç konu eklenmemiş</h3></td></tr>';
					}
			?>
            </table>
            </div>
            <?php
			break;
			
			
			
			case "konu_ekle";
			?>
            <h2>konu ekle</h2>
            <?php
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
		$onay = $_POST["onay"];
		if(move_uploaded_file($_FILES["dosya"]["tmp_name"],$yeniad)){
			
		if(!$baslik || !$aciklama){
			echo "<h2 class='dikkat'>Lütfen Boş Alan Bırakmayınız Yönlendiriliyorsunuz</h2>";
			header("refresh: 2; url=konuekle.php");
			}else{
				$insert = $db->prepare("insert into konular set
				
	            konu_ekleyen=?,
				konu_baslik=?,
				konu_dosya=?,
				konu_aciklama=?,
				konu_durum=?
				
				");
				$kayit = $insert->execute(array($_SESSION["uye"],$baslik,$yeniad,$aciklama,$onay));
				if($kayit){
					echo "<h2 class='dikkat'>Konu Kaydedildi Yönderiliyorsunuz</h2>";
					header("refresh: 2; url=?do=konu");
					}else{
						echo "<h2 class='dikkat'>Konu Eklerken Bir Hata Oluştu Lütfen Yeniden Deneyiniz Yönlendiriliyorsunuz</h2>";
						header("refresh: 2; url=?do=konu");
						}
				}
		}else{
			echo "<h2 class='dikkat'>dosya jpg,png veya gif olmalıdır lütfen tekrar deneyiniz yönlendiriliyorsunuz</h2>";
			header("refresh: 2; url=?do=konu");
			}
		}
			}
		}else{
			
			?>
            <div class="adminkonuekle">
            <form action="" method="post" enctype="multipart/form-data">
            <ul>
            <li>Şehir Adı</li>
            <li><input type="text" name="baslik" /></li>
            <li>Resim Ekle</li>
            <li><input type="file" name="dosya" /></li>
            <li>Açıklama</li>
            <li><textarea name="aciklama"></textarea></li>
            <li><select name="onay">
                <option value="1">onaylı</option>
                <option value="0">onaylı değil</option>
                </select></li>
            <li><button type="submit">Konu Ekle</button></li>
            </ul>
            </form>
            </div>
			<?php
			}
			break;
			
			
			
			case "konu_duzenle";
			$id = $_GET["id"];
			
			?>
				<h2>Konu Guncelle</h2>
				<?php
				if($_POST){
					
					
		$baslik = strip_tags($_POST["baslik"]);
		$dosya = $_POST["dosya"];
		$aciklama = strip_tags($_POST["aciklama"]);
		$onay = $_POST["onay"];
					
					if(!$baslik || !$aciklama){
					   
                        echo '<h3 class="admindikkat">bos alan bırakmayın</h3>';					   
						
					}else {
						
						
						
						$update = $db->prepare("update konular set 
						
						            konu_baslik=?,
									konu_dosya=?,
						            konu_aciklama=?,
									konu_durum=?
									where konu_id=?
						");
						
						$guncelle = $update->execute(array($baslik,$dosya,$aciklama,$onay,$id));
						
						if($guncelle){
							
							echo '<h4 class="admindikkat">konu basarıyla guncellendi yonlendiriliyorsunuz</h4>';
							
							header("refresh: 2; url=?do=konu");
							
						}else {
							
							echo '<h3 class="admindikkat">konu guncellenirken bir hata olustu</h3>';
							
						}
				
		
			}
		}else{
					
					$v = $db->prepare("select * from konular where konu_id=?");
						$v->execute(array($id));
						$z = $v->fetch(PDO::FETCH_ASSOC);
						$x = $v->rowCount();
						
					?>
					<div class="adminkonuekle">
            <form action="" method="post" enctype="multipart/form-data">
            <ul>
            <li>Şehir Adı</li>
            <li><input type="text" value="<?php echo $z["konu_baslik"];?>" name="baslik" /></li>
            <li>Resim Ekle</li>
            <li><input type="text" value="<?php echo $z["konu_dosya"];?>" name="dosya" /></li>
            <li><img src="<?php echo $z["konu_dosya"];?>" width="200" height="200" /></li>
            <li>Açıklama</li>
            <li><textarea name="aciklama"><?php echo $z["konu_aciklama"];?></textarea></li>
            <li><select name="onay">
                <option value="1" <?php echo $z["konu_durum"] == 1 ? 'selected' : null; ?> >onaylı</option>
                <option value="0" <?php echo $z["konu_durum"] == 0 ? 'selected' : null; ?> >onaylı değil</option>
                </select></li>
            <li><button type="submit">Konu Guncelle</button></li>
            </ul>
            </form>
            </div>
					<?php
					
					
				}
				
			break;
			
			
			
			case "konu_sil";
			?>
			<h2>Konu Sil</h2>
			<?php
			$id = $_GET["id"];
			
			$delete = $db->prepare("delete from konular where konu_id=?");
			$sil = $delete->execute(array($id));
			$x = $delete->rowCount();
			
			if($x){
				if($sil){
					echo '<h4 class="admindikkat">Konu Başarıyla Silindi Yönlendiriliyorsunuz</h4>';
					header("refresh: 2; url=?do=konu");
					}else{
						echo '<h3 class="admindikkat">Konu Silinirken Bir Hata Oluştu</h3>';
						header("refresh: 2; url=?do=konu");
						}
				
				}else{
					echo '<h3 class="admindikkat">Boyle Bir Konu Bulunmuyor</h3>';
					}
			
			break;
			
			
			
			case"uye";
						?>
            <?php
			include("baglan.php");
			?>
			<h2>Uyeler</h2>
            <?php
            $v = $db->prepare("select * from uye");
			$v->execute(array());
			$c = $v->fetchAll(PDO::FETCH_ASSOC);
			$x = $v->rowCount();
			?>
            <div class="adminkonu">
            <table cellpadding="0" cellspacing="0">
            <thead>
            <tr><th>Kullanici Adi</th><th>Sifre</th><th>Durum</th><th>İşlemler</th></tr>
            </thead>
            <?php
			if($x){
				foreach($c as $m){
					?>
                    <tbody>
            <tr><td width="300px"><?php echo $m["uye_kullanici"]; ?></td>
            <td width="300px"><?php echo $m["uye_sifre"]; ?></td>
            <td width="250px"><?php 
			if($m["uye_durum"] == 1){
				echo '<span style="color:green">Admin</span>';
				}else{
					echo '<span style="color:red">Uye</span>';
					}
			 ?></td><td width="250px" align="center"><a onClick="return confirm('Uye Kaydını Silmek İstediğinize Eminmisiniz');" href="?do=uye_sil&id=<?php echo $m["id"]; ?>"> Sil </a><a href="?do=uye_duzenle&id=<?php echo $m["id"]; ?>"> duzenle </a></td></tr>
            </tbody>
                    <?php
					}
				}else{
					echo '<tr><td width="1300" colspan="4"><h3 class="admindikkat">henüz siteye kayıtlı uye yok</h3></td></tr>';
					}
			?>
            </table>
            </div>
            <?php
			
			break;
			
			
			
			
			case"uye_duzenle";
			
						?>
            <?php
			try {

	$db=new PDO("mysql:host=localhost;dbname=uyelik;charset=utf8",'root','12345678');
}

catch (PDOExpception $e) {

	echo $e->getMessage();
}
			?>
			
				<h2>Uye Guncelle</h2>
				<?php
				$id = $_GET["id"];
				if($_POST){
					
					
		$kullanici = $_POST["kullanici"];
		$sifre = $_POST["sifre"];
		$durum = $_POST["durum"];
					
					if(!$kullanici || !$sifre){
					   
                        echo '<h3 class="admindikkat">bos alan bırakmayın</h3>';					   
						
					}else {
						
						$update = $db->prepare("update uye set 
						
						            uye_kullanici=?,
									uye_sifre=?,
									uye_durum=?
									where id=?
						");
						
						$guncelle = $update->execute(array($kullanici,$sifre,$durum,$id));
						
						if($guncelle){
							
							echo '<h4 class="admindikkat">uye bilgileri basarıyla guncellendi yonlendiriliyorsunuz</h4>';
							
							header("refresh: 2; url=?do=uye");
							
						}else {
							
							echo '<h3 class="admindikkat">uye bilgileri guncellenirken bir hata olustu</h3>';
							header("refresh: 2; url=?do=uye");
							
						}
			}
		}else{
					
					$v = $db->prepare("select * from uye where id=?");
						$v->execute(array($id));
						$z = $v->fetch(PDO::FETCH_ASSOC);
						$x = $v->rowCount();
						
					?>
					<div class="adminkonuekle">
            <form action="" method="post">
            <ul>
            <li>Kullanici adi</li>
            <li><input type="text" value="<?php echo $z["uye_kullanici"];?>" name="kullanici" /></li>
            <li>Sifre</li>
            <li><input type="text" value="<?php echo $z["uye_sifre"];?>" name="sifre" /></li>
            <li><select name="durum">
                <option value="1" <?php echo $z["uye_durum"] == 1 ? 'selected' : null; ?> >Admin</option>
                <option value="0" <?php echo $z["uye_durum"] == 0 ? 'selected' : null; ?> >Uye</option>
                </select></li>
            <li><button type="submit">uye bilgileri Guncelle</button></li>
            </ul>
            </form>
            </div>
					<?php
						
				}
				
			break;
			
			
			
			
			case "uye_sil";
			?>
            <?php
			include("baglan.php");
			?>
			<h2>Uye Sil</h2>
			<?php
			$id = $_GET["id"];
			
			$delete = $db->prepare("delete from uye where id=?");
			$sil = $delete->execute(array($id));
			$x = $delete->rowCount();
			
			if($x){
				if($sil){
					echo '<h4 class="admindikkat">Uye Başarıyla Silindi Yönlendiriliyorsunuz</h4>';
					header("refresh: 2; url=?do=uye");
					}else{
						echo '<h3 class="admindikkat">Uye Silinirken Bir Hata Oluştu</h3>';
						header("refresh: 2; url=?do=uye");
						}
				
				}else{
					echo '<h3 class="admindikkat">Boyle Bir Uye Bulunmuyor</h3>';
					}
			
			break;
			
			
			
			
			case"yorum";
			
			?>
            <?php
			include("baglan3.php");
			?>
			<h2>Yorumlar</h2>
            <?php
            $v = $db->prepare("select * from yorumlar");
			$v->execute(array());
			$c = $v->fetchAll(PDO::FETCH_ASSOC);
			$x = $v->rowCount();
			?>
            <div class="adminkonu">
            <table cellpadding="0" cellspacing="0">
            <thead>
            <tr><th>Yorum Ekleyen</th><th>Mesaj</th><th>İşlemler</th></tr>
            </thead>
            <?php
			if($x){
				foreach($c as $m){
					?>
                    <tbody>
            <tr><td width="200px"><?php echo $m["yorum_ekleyen"]; ?></td>
            <td width="600px"><?php echo $m["yorum_mesaj"]; ?></td>
            <td width="250px" align="center"><a onClick="return confirm('Yorumu Silmek İstediğinize Eminmisiniz');" href="?do=yorum_sil&id=<?php echo $m["yorum_id"]; ?>"> Sil </a><a href="?do=yorum_duzenle&id=<?php echo $m["yorum_id"]; ?>"> duzenle </a></td></tr>
            </tbody>
                    <?php
					}
				}else{
					echo '<tr><td width="1300" colspan="4"><h3 class="admindikkat">henüz yorum yok</h3></td></tr>';
					}
			?>
            </table>
            </div>
            <?php
			
			break;
			
			case"yorum_duzenle";
			
			
			?>
            <?php
			include("baglan3.php");
			?>
			
				<h2>Yorum Guncelle</h2>
				<?php
				$id = $_GET["id"];
				if($_POST){
					
					
		$ekleyen = $_POST["ekleyen"];
		$mesaj = $_POST["mesaj"];
					
					if(!$ekleyen || !$mesaj){
					   
                        echo '<h3 class="admindikkat">bos alan bırakmayın</h3>';					   
						
					}else {
						
						$update = $db->prepare("update yorumlar set 
						
						            yorum_ekleyen=?,
									yorum_mesaj=?
									where yorum_id=?
						");
						
						$guncelle = $update->execute(array($ekleyen,$mesaj,$id));
						
						if($guncelle){
							
							echo '<h4 class="admindikkat">Yorum basarıyla guncellendi yonlendiriliyorsunuz</h4>';
							
							header("refresh: 2; url=?do=yorum");
							
						}else {
							
							echo '<h3 class="admindikkat">Yorum guncellenirken bir hata olustu</h3>';
							header("refresh: 2; url=?do=yorum");
							
						}
			}
		}else{
					
					$v = $db->prepare("select * from yorumlar where yorum_id=?");
						$v->execute(array($id));
						$z = $v->fetch(PDO::FETCH_ASSOC);
						$x = $v->rowCount();
						
					?>
					<div class="adminkonuekle">
            <form action="" method="post">
            <ul>
            <li>Ekleyen</li>
            <li><input type="text" value="<?php echo $z["yorum_ekleyen"];?>" name="ekleyen" /></li>
            <li>mesaj</li>
            <li><textarea name="mesaj"><?php echo $z["yorum_mesaj"];?></textarea></li>
            <li><button type="submit">Yorum Guncelle</button></li>
            </ul>
            </form>
            </div>
					<?php
					
					
				}
			
			break;
			
			case"yorum_sil";
			
			
			?>
            <?php
			include("baglan3.php");
			?>
			<h2>Yorum Sil</h2>
			<?php
			$id = $_GET["id"];
			
			$delete = $db->prepare("delete from yorumlar where yorum_id=?");
			$sil = $delete->execute(array($id));
			$x = $delete->rowCount();
			
			if($x){
				if($sil){
					echo '<h4 class="admindikkat">Yorum Başarıyla Silindi Yönlendiriliyorsunuz</h4>';
					header("refresh: 2; url=?do=yorum");
					}else{
						echo '<h3 class="admindikkat">Yorum Silinirken Bir Hata Oluştu</h3>';
						header("refresh: 2; url=?do=yorum");
						}
				
				}else{
					echo '<h3 class="admindikkat">Boyle Bir Yorum Bulunmuyor</h3>';
					}
			
			break;
			
			default:
			echo"<h2 style='border:1px solid #ddd;margin2px;padding:10px;background:lightgreen;'>Admin Paneli Anasayfası</h2>";
			break;
			}
		
		?>
        </div>
        </div>
        
        <?php
		}else{
			echo"<div style='border:1px solid #ddd; width:500px;height:20px;margin:5px;padding:10px;position:relative;top:200px;left:400px;font-size:20px;background:red;'>Bu Sayfaya Girme Yetkiniz Yok</div>";
			header("refresh: 2;url=giriss.php");
			}
	}else{
		echo"<div style='border:1px solid #ddd; width:500px;height:20px;margin:5px;padding:10px;position:relative;top:200px;left:400px;font-size:20px;background:red;'>Bu Sayfaya Girme Yetkiniz Yok</div>";
		header("refresh: 2;url=giriss.php");
		}

?>
</body>
</html>