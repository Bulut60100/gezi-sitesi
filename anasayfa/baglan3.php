<?php 
       try {

	$db=new PDO("mysql:host=localhost;dbname=konu;charset=utf8",'root','12345678');
}

catch (PDOExpception $e) {

	echo $e->getMessage();
}
   
?>