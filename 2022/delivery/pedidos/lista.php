<?php
    $idUsuario = $_SESSION["id"];
    $consulta  = " SELECT * FROM tb_pedidos WHERE fk_clave_usu = ? ORDER BY pk_clave_ped DESC ";
    $query = $conn->prepare($consulta);
    $query->bindParam(1, $idUsuario);
    $query->execute();
?>
<div class="container-fluid py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Mis pedidos</h1>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-12 col-md-2 border p-2">
                No de pedido
            </div>
            <div class="col-12 col-md-2 border p-2">
                Fecha
            </div>
            <div class="col-12 col-md-2 border p-2">
                Total
            </div>
            <div class="col-12 col-md-2 border p-2">
                Estatus
            </div>
            <div class="col-12 col-md-4 border p-2">
                Acciones
            </div>
        </div>
        <?php
            while($registro = $query->fetch()){
        ?>
            <div class="row text-center">
                <div class="col-12 col-md-2 border p-2">
                    <?=$registro["pk_clave_ped"]?>
                </div>
                <div class="col-12 col-md-2 border p-2">
                    <?=$registro["fec_fechapedido_ped"]?>
                </div>
                <div class="col-12 col-md-2 border p-2">
                    <?=$registro["num_total_ped"]?>
                </div>
                <div class="col-12 col-md-2 border p-2">
                    <?php
                        $estatus = "";
                        switch ($registro["num_estatus_ped"]) {
                            case 1:
                                $estatus = "Pendiente";
                                break;
                            case 2:
                                $estatus = "Confirmado";
                                break;
                            case 3:
                                $estatus = "Entregado";
                        }
                    ?>
                    <?=$estatus?>
                </div>
                <div class="col-12 col-md-4 border p-2">
                    <a href="?seccion=pedidos&accion=detalle&id=<?=$registro["pk_clave_ped"]?>">
                        <button class="btn btn-sm btn-success">Ver detalle</button>
                    </a>
                    <?php
                    if($registro["num_estatus_ped"]==1)
                    {
                    ?>
                        <a href="?seccion=pedidos&accion=modificar&id=<?=$registro["pk_clave_ped"]?>">
                            <button class="btn btn-sm btn-warning">Modificar</button>
                        </a>
                        <a href="?seccion=pedidos&accion=borrarPedido&id=<?=$registro["pk_clave_ped"]?>">
                            <button class="btn btn-sm btn-danger">Borrar</button>
                        </a>
                        <a href="?seccion=pedidos&accion=confirmar&id=<?=$registro["pk_clave_ped"]?>">
                            <button class="btn btn-sm btn-primary">Confirmar</button>
                        </a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        <?php
            }
        ?>
    </div>
</div>