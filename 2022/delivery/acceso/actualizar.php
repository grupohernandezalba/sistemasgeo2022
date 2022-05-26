<?php

  $nombre=$_POST["nombre"];
  $usuario=$_POST["usuario"];
  $contrasena=$_POST["contrasena"];
  $id=$_SESSION["id"];

  $consulta  = " UPDATE tb_usuarios SET
                        txt_nombre_usu=?,
                        txt_email_usu=?,
                        txt_contrasena_usu=?
                        WHERE pk_clave_usu=? ";
  $query = $conn->prepare($consulta);
  $query->bindParam(1, $nombre);
  $query->bindParam(2, $usuario);
  $query->bindParam(3, $contrasena);
  $query->bindParam(4, $id);
  $query->execute();

?>
<div class="container-fluid py-5">
    <div class="row">
        <div class="col-12 text-center">
            <h1>MI CUENTA</h1>
        </div>          
    </div>
    <div class="row">
      <div class="col-12 text-center">
        <h2>Se guardaron los cambios de su cuenta.</h2>
      </div>
    </div>
</div>
