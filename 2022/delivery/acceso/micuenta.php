<?php
if (isset($_SESSION["id"])) 
{
  $id = $_SESSION["id"];
  $consulta  = "SELECT * FROM tb_usuarios WHERE pk_clave_usu=? ";
  $query = $conn->prepare($consulta);
  $query->bindParam(1, $id);
  $query->execute();
  $registro = $query->fetch();
?>
  <div class="container-fluid py-5">
    <div class="row">
      <div class="col-12 text-center">
        <h1>MI CUENTA</h1>
      </div>
    </div>
  </div>

  <div class="container-fluid mb-5">

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <form action="?seccion=acceso&accion=actualizar" id="form1" method="post">
            <fieldset>
              <div class="row mt-2">
                <div class="col-12">
                  Nombre:
                  <input type="text" required name="nombre" id="nombre" class="form-control" size="80" maxlength="80" value="<?php echo $registro['txt_nombre_usu']; ?>" />
                </div>
                <div class="col-12">
                  Usuario (Correo electrónico):
                  <input type="email" required name="usuario" id="usuario" class="form-control" value="<?php echo $registro['txt_email_usu']; ?>" />
                </div>
                <div class="col-12">
                  Contraseña:
                  <div class="input-group mb-3">
                    <input type="password" required name="contrasena" id="contrasena" class="form-control" size="80" maxlength="80" value="<?=$registro['txt_contrasena_usu']?>">
                  </div>

                </div>
              </div>
              <div class="row mt-2">
                <div class="col-12 text-center">
                  <button type="submit" class="btn btn-danger">Guardar cambios</button>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php
} else {
?>
  <div class="container-fluid py-5">
    <div class="row">
      <div class="col-12 text-center">
        <h1>ACCESO NO AUTORIZADO</h1>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-12 py-3">
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error de permiso de usuario!</strong> , Ud. no tiene acceso a este módulo.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
}
?>