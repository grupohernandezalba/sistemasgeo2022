<?php

	$usuario    = "admin-appweb-delivery";
	$contrasena = "#&SeJ@+Up*8.";
	try{
    	$conn = new PDO('mysql:host=localhost;dbname=appweb-delivery', $usuario, $contrasena);
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 	}
		catch(PDOException $e)
			{
    			echo "ERROR: " . $e->getMessage();
			}
?>