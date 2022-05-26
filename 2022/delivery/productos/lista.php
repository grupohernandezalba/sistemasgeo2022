<div class="container-fluid my-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h2 data-aos="zoom-in-up">NUESTROS PRODUCTOS</h2>
            </div>
        </div>
        <div class="row">
            <?php
                $consulta  = " SELECT * FROM tb_productos";
                $query = $conn->prepare($consulta);
                $query->execute();
                while($registro = $query->fetch()) {
                    include("productos/tarjeta.php");
                }
            ?>
        </div>
    </div>
</div>
