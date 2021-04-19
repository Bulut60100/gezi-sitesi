<?php 
        // Server Kullanıcı Adı
        $user        =    "root";
        // Server Kullanıcı Şifresi
        $pass        =    "12345678";
        // Server Adresi
        $host        =    "localhost";
        // Veritabanı Adı
        $db            =    "iletisim";
        
        //Veritabanı Bağlantısı Oluşturma
        $baglan = mysql_connect($host,$user,$pass) or die(mysql_error());
        
        //Veritabanına Bağlama
        mysql_select_db($db,$baglan) or die(mysql_error());    
?>