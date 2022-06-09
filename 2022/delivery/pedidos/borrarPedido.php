<?php
    $id = $_GET["id"];

    $consulta2  = " DELETE FROM tb_detalle 
        WHERE fk_clave_ped = ?";
    $query2 = $conn->prepare($consulta2);
    $query2->bindParam(1, $id);
    $query2->execute();

    $consulta3  = " DELETE FROM tb_pedidos
                    WHERE pk_clave_ped = ?";
    $query3 = $conn->prepare($consulta3);
    $query3->bindParam(1, $id);
    $query3->execute();

?>
<script>
    window.location.href = "?seccion=pedidos&accion=lista";
</script>