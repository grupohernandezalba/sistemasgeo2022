<?php

    $idProducto = $_GET["idProducto"]; 
    $idUsuario = $_SESSION["id"];

    $consulta  = " SELECT * FROM tb_productos WHERE pk_clave_pro = ? ";
    $query = $conn->prepare($consulta);
    $query->bindParam(1, $idProducto);
    $query->execute();
    $registro = $query->fetch();

    if(!isset($_SESSION["idPedido"]))
    {
        $consulta2  = " INSERT INTO tb_pedidos 
            (fk_clave_usu,num_total_ped,fec_fechapedido_ped,
            num_estatus_ped,num_latitud_ped,num_longitud_ped) 
            VALUES (?,?,NOW(),1,0,0) ";
        $query2 = $conn->prepare($consulta2);
        $query2->bindParam(1, $idUsuario);
        $query2->bindParam(2, $registro["num_precio_pro"]);
        $query2->execute();

        $consulta3  = " SELECT MAX(pk_clave_ped) as maximo FROM tb_pedidos ";
        $query3 = $conn->prepare($consulta3);
        $query3->execute();
        $registro3 = $query3->fetch();
        $_SESSION["idPedido"] = $registro3["maximo"];
    }
    else
    {
        $consulta2  = " INSERT INTO tb_detalle 
            (fk_clave_pro,num_precio_det,fk_clave_ped,num_cantidad_det) 
            VALUES (?,?,?,1) ";
        $query2 = $conn->prepare($consulta2);
        $query2->bindParam(1, $registro["pk_clave_pro"]);
        $query2->bindParam(2, $registro["num_precio_pro"]);
        $query2->bindParam(3, $_SESSION["idPedido"]);
        $query2->execute();

        $consulta3  = " UPDATE tb_pedidos SET
                num_total_ped = num_total_ped + ?
                WHERE pk_clave_ped = ? ";
        $query3 = $conn->prepare($consulta3);
        $query3->bindParam(1, $registro["num_precio_pro"]);
        $query3->bindParam(2, $_SESSION["idPedido"]);
        $query3->execute();
    }

?>
<script>
    window.location.href = "?seccion=pedidos&accion=detalle&id=<?=$_SESSION["idPedido"]?>";
</script>