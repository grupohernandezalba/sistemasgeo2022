<?php
    $id = $_GET["id"];
    $consulta  = " SELECT * FROM tb_detalle, tb_productos 
                    WHERE fk_clave_ped = ? 
                    AND fk_clave_pro = pk_clave_pro ORDER BY pk_clave_det DESC ";
    $query = $conn->prepare($consulta);
    $query->bindParam(1, $id);
    $query->execute();
?>
<div class="container-fluid py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Detalle del pedido <?=$id?></h1>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-12 col-md-3 border p-2">
                Producto
            </div>
            <div class="col-12 col-md-3 border p-2">
                Precio
            </div>
            <div class="col-12 col-md-3 border p-2">
                Cantidad
            </div>
            <div class="col-12 col-md-3 border p-2">
                Acciones
            </div>
        </div>
        <?php
            $totalPrecio = 0;
            $totalCantidad = 0;
            while($registro = $query->fetch()){
        ?>
            <div class="row text-center">
                <div class="col-12 col-md-3 border p-2">
                    <?=$registro["txt_nombre_pro"]?>
                </div>
                <div class="col-12 col-md-3 border p-2">
                    $<?=$registro["num_precio_det"]?>
                </div>
                <div class="col-12 col-md-3 border p-2">
                    <?=$registro["num_cantidad_det"]?>
                </div>
                <div class="col-12 col-md-3 border p-2">
                    <a href="?seccion=pedidos&accion=borrarProducto&id=<?=$id?>&idDetalle=<?=$registro["pk_clave_det"]?>&idProducto=<?=$registro["pk_clave_pro"]?>">
                        <button class="btn btn-danger">Borrar</button>
                    </a>
                </div>
            </div>
        <?php
            $totalPrecio += $registro["num_precio_det"];
            $totalCantidad += $registro["num_cantidad_det"];
            }
        ?>
        <div class="row text-center">
            <div class="col-12 col-md-3 border p-2">
            </div>
            <div class="col-12 col-md-3 border p-2">
                $<?=$totalPrecio?>
            </div>
            <div class="col-12 col-md-3 border p-2">
                <?=$totalCantidad?>
            </div>
            <div class="col-12 col-md-3 border p-2">
            </div>
        </div>
    </div>
</div>