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
            case "detalle":
                include ("detalle.php");
                break;
            case "borrarProducto":
                include ("borrarProducto.php");
                break;
            case "modificar":
                include ("modificar.php");
                break;
            case "borrarPedido":
                include ("borrarPedido.php");
                break;
            case "confirmar":
                include ("confirmar.php");
                break;
            case "finalizar":
                include ("finalizar.php");
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
