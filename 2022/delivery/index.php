<?php  
    
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include("conexion/index.php"); 

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DLS EATS</title>
</head>
<body>
    <h1>DLS EATS</h1>
    <?php

        $consulta  = " SELECT * FROM tb_productos";
        $query = $conn->prepare($consulta);
        $query->execute();
        while($registro = $query->fetch()) {
            echo $registro["pk_clave_pro"] . " - " . $registro["txt_nombre_pro"] . "<br>";
         }
    ?>
</body>
</html>