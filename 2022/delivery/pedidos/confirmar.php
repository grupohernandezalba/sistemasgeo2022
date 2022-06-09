<?php
    $id = $_GET["id"];
    $consulta  = " SELECT * FROM tb_detalle, tb_productos 
                    WHERE fk_clave_ped = ? 
                    AND fk_clave_pro = pk_clave_pro ORDER BY pk_clave_det DESC ";
    $query = $conn->prepare($consulta);
    $query->bindParam(1, $id);
    $query->execute();
?>
 <form id="formulario" class="ingresa" action="?seccion=pedidos&accion=finalizar&id=<?=$id?>" method="post">
<div class="container-fluid py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="row text-center">
                    <div class="col-12 border p-2">
                        <h3>Resumen del pedido</h3>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-12 col-md-4 border p-2">
                        Producto
                    </div>
                    <div class="col-12 col-md-4 border p-2">
                        Precio
                    </div>
                    <div class="col-12 col-md-4 border p-2">
                        Cantidad
                    </div>
                </div>
                <?php
                    $totalPrecio = 0;
                    $totalCantidad = 0;
                    while($registro = $query->fetch()){
                ?>
                    <div class="row text-center">
                        <div class="col-12 col-md-4 border p-2">
                            <?=$registro["txt_nombre_pro"]?>
                        </div>
                        <div class="col-12 col-md-4 border p-2">
                            $<?=$registro["num_precio_det"]?>
                        </div>
                        <div class="col-12 col-md-4 border p-2">
                            <?=$registro["num_cantidad_det"]?>
                        </div>
                    </div>
                <?php
                    $totalPrecio += $registro["num_precio_det"];
                    $totalCantidad += $registro["num_cantidad_det"];
                    }
                ?>
                <div class="row text-center">
                    <div class="col-12 col-md-4 border p-2">
                    </div>
                    <div class="col-12 col-md-4 border p-2">
                        $<?=$totalPrecio?>
                    </div>
                    <div class="col-12 col-md-4 border p-2">
                        <?=$totalCantidad?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="row text-center">
                    <div class="col-12 border p-2">
                        <h3>Dirección de entrega</h3>                    
                        <?php include("pedidos/mapa.php"); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row py-5">
            <div class="col-12 text-center">
                <input type="submit" class="btn btn-lg btn-primary" value="Finalizar">
            </div>
        </div>
    </div>
</div>
</form>