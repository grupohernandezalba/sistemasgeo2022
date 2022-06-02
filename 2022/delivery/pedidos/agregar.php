<?php

    $idProducto = $_GET["idProducto"]; 
    $idUsuario = $_SESSION["id"];

    $consulta  = " SELECT * FROM tb_productos WHERE pk_clave_pro = ? ";
    $query = $conn->prepare($consulta);
    $query->bindParam(1, $idProducto);
    $query->execute();
    $registro = $query->fetch();

    $consulta2  = " INSERT INTO tb_pedidos 
        (fk_clave_usu,num_total_ped,fec_fechapedido_ped,
        num_estatus_ped,num_latitud_ped,num_longitud_ped) 
        VALUES (?,?,NOW(),1,0,0) ";
    $query2 = $conn->prepare($consulta2);
    $query2->bindParam(1, $idUsuario);
    $query2->bindParam(2, $registro["num_precio_pro"]);
    $query2->execute();
    $registro2 = $query2->fetch();
?>
<script>
    window.location.href = "?seccion=pedidos&accion=lista";
</script>