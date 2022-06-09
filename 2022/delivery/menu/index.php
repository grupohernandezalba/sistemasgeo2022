<nav class="navbar navbar-expand-lg navbar-light shadow" style="z-index: 1000;" data-aos="zoom-in-up" style="background-color: #fcfcfc;">
  <div class="container-fluid">
    <a class="navbar-brand" href="?seccion=inicio">
      <img src="imagenes/logo-dls-pizza.png" alt="Logo" class="w-75">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="?seccion=inicio">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Promociones</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Productos
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php

              $consulta  = " SELECT * FROM tb_categorias ";
              $query = $conn->prepare($consulta);
              $query->execute();
              while($registro = $query->fetch()){
                
                $consulta2  = " SELECT COUNT(*) as total FROM tb_productos 
                                WHERE fk_clave_cat = ? ";
                $query2 = $conn->prepare($consulta2);
                $query2->bindParam(1,$registro["pk_clave_cat"]);
                $query2->execute();
                $registro2 = $query2->fetch();

           ?>
            <li><a class="dropdown-item" href="?seccion=productos&accion=lista&idCategoria=<?=$registro["pk_clave_cat"]?>"><?=$registro["txt_nombre_cat"]?> (<?=$registro2["total"]?>)</a></li>
           <?php
              }
            ?>
          </ul>
        </li>
        <?php
        if(isset($_SESSION["id"])) 
        {
        ?>
          <li class="nav-item">
            <a class="nav-link" href="?seccion=pedidos&accion=lista">Mis pedidos</a>
          </li>
        <?php
        }
        ?>
        <?php
        if(!isset($_SESSION["id"])) 
        {
        ?>
        <li class="nav-item">
          <a class="nav-link" href="?seccion=acceso">Ingresar</a>
        </li>
        <?php
        }
        ?>
        <?php
        if(isset($_SESSION["id"])) 
        {
        ?>
          <li class="nav-item">
            <a class="nav-link" href="?seccion=acceso&accion=micuenta">Mi cuenta</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?seccion=acceso&accion=salir">Salir</a>
          </li>
        <?php
        }
        ?>
      </ul>
      <form class="d-flex" action="?seccion=productos&accion=lista" method="post">
        <input class="form-control me-2" type="search" name="buscar" placeholder="buscar..." aria-label="Search">
        <button class="btn btn-warning" type="submit">Buscar</button>
      </form>
    </div>
  </div>
</nav>