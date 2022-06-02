<div class="container-fluid my-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h2 data-aos="zoom-in-up">NUESTROS PRODUCTOS</h2>
            </div>
        </div>
        <div class="row">
            <?php
                if(isset($_GET["idCategoria"]))
                    {
                        $consulta  = " SELECT * FROM tb_productos, tb_categorias
                                       WHERE fk_clave_cat = ? AND pk_clave_cat = fk_clave_cat ";
                        $query = $conn->prepare($consulta);
                        $query->bindParam(1,$_GET["idCategoria"]);
                    }
                else
                    {
                        $consulta  = " SELECT * FROM tb_productos , tb_categorias
                                       WHERE pk_clave_cat = fk_clave_cat";
                        if(isset($_POST["buscar"]))
                        {
                            $consulta  .= " AND txt_nombre_pro LIKE '%" . $_POST["buscar"] . "%'";
                        }

                        $query = $conn->prepare($consulta);
                    }
                
                $query->execute();
                $contador = 0;
                while($registro = $query->fetch()) {
                    if(!$contador && !isset($_POST["buscar"]) )
                        echo "<h3 class='text-center'>" . $registro["txt_nombre_cat"] . "</h3>";
                    include("productos/tarjeta.php");
                    $contador++;
                }

                if(!$contador)
                    echo "<p class='text-center'>No se encontraron productos</p>";
            ?>
        </div>
    </div>
</div>
