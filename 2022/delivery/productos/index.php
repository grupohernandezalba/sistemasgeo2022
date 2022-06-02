<?php
    $accion = (isset($_GET['accion']) && $_GET['accion']!='') ? $_GET['accion'] : 'lista';


    switch ($accion)
    {
        case "lista":
            include ("lista.php");
            break;
    }
?>
