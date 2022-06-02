<?php
    if (isset($_SESSION["id"])) 
    {
        $accion = (isset($_GET['accion']) && $_GET['accion']!='') ? $_GET['accion'] : 'lista';

        switch ($accion)
        {
            case "lista":
                include ("lista.php");
                break;
            case "agregar":
                include ("agregar.php");
                break;
        }
    }
    else
    {
?>
    <script>
        window.location.href = "?seccion=acceso&mensaje=hacerpedido";
    </script>
<?php
    }
?>
