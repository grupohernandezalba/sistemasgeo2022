<?php
    $id = $_GET["id"];
    $idDetalle = $_GET["idDetalle"]; 
    $idProducto = $_GET["idProducto"]; 

    $consulta  = " SELECT * FROM tb_productos WHERE pk_clave_pro = ? ";
    $query = $conn->prepare($consulta);
    $query->bindParam(1, $idProducto);
    $query->execute();
    $registro = $query->fetch();

    $consulta3  = " UPDATE tb_pedidos SET
                    num_total_ped = num_total_ped - ?
                    WHERE pk_clave_ped = ? ";
    $query3 = $conn->prepare($consulta3);
    $query3->bindParam(1, $registro["num_precio_pro"]);
    $query3->bindParam(2, $id);
    $query3->execute();

    $consulta2  = " DELETE FROM tb_detalle 
                    WHERE pk_clave_det = ?";
    $query2 = $conn->prepare($consulta2);
    $query2->bindParam(1, $idDetalle);
    $query2->execute();
?>
<script>
    window.location.href = "?seccion=pedidos&accion=detalle&id=<?=$id?>";
</script>