<?php 
try {
	$db = new PDO('mysql:host=localhost;dbname=camaguru;charset=utf8mb4', 'root', 'password');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	//echo "Connected";	
} catch (PDOException $e) {
	echo "Connection failed : ". $e->getMessage();
}
?>