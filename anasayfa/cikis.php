<?php

session_start();

session_destroy();

echo"<div style='border:1px solid #ddd; width:500px;height:20px;margin:5px;padding:10px;position:relative;top:200px;left:400px;font-size:20px;background:green;'>Başarıyla Çıkış Yaptınız</div>";

header("refresh: 2; url=giriss.php");

?>

