<?php
   $_SESSION["idPedido"] = $_GET["id"];
?>
<script>
    window.location.href = "?seccion=pedidos&accion=detalle&id=<?=$_GET["id"]?>";
</script>