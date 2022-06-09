<?php

    $id = $_GET["id"]; 
    $route = $_POST["route"];
    $street_number = $_POST["street_number"];

    $consulta = " UPDATE tb_pedidos SET
                    num_estatus_ped = 3
                    WHERE pk_clave_ped = ? ";
    $query = $conn->prepare($consulta);
    $query->bindParam(1, $id);
    $query->execute();

?>
 <div class="container-fluid py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Su pedido ha sido enviado</h1>
            </div>
        </div>
    </div>
</div>