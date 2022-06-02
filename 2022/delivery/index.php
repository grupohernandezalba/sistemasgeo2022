<?php  
    
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    session_start();
    
    include("conexion/index.php"); 

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DLS EATS</title>

    <link rel="icon" type="image/png" href="imagenes/dlspizza-favicon.png">

    <!-- BootStrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- Hover -->   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.1.1/css/hover-min.css" integrity="sha512-SJw7jzjMYJhsEnN/BuxTWXkezA2cRanuB8TdCNMXFJjxG9ZGSKOX5P3j03H6kdMxalKHZ7vlBMB4CagFP/de0A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- AOS -->   
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- CSS personalizado -->
    <link href="css/index.css" rel="stylesheet">
    
</head>
<body>
    <?php
        $seccion = (isset($_GET['seccion']) && $_GET['seccion'] != '') ? $_GET['seccion'] : 'inicio';
        $accion = (isset($_GET['accion']) && $_GET['accion'] != '') ? $_GET['accion'] : 'lista';
        include("menu/index.php");
        
  
        switch ($seccion) {
            case "inicio":
                include("inicio/index.php");
                include("productos/lista.php");
                break;
            case "aviso":
                include("aviso/index.php");
                break;
            case "terminos":
                include("terminos/index.php");
                break;
            case "acceso":
                include("acceso/index.php");
                break;
            case "productos":
                include("productos/index.php");
                break;
            case "pedidos":
                include("pedidos/index.php");
                break;
        }
 
        include("piedepagina/index.php");

    ?>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <!-- AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/725910d27b.js" crossorigin="anonymous"></script>

    <script>
        AOS.init();
    </script>

</body>
</html>