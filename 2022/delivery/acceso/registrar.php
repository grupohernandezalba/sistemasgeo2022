<div class="container-fluid py-5">
    <div class="row">
        <div class="col-12 text-center">
            <h1>REGISTRAR</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <form action="?seccion=acceso&accion=insertar" id="form1" method="post">
            <fieldset>
            <div class="row mt-2">
                <div class="col-12">
                    Nombre:
                    <input type="text" required name="nombre" id="nombre" class="form-control" size="80" maxlength="80">
                </div>
                <div class="col-12">
                    Usuario (Correo electrónico):
                    <input type="email" required name="usuario" id="usuario" class="form-control">
                </div>
                <div class="col-12">
                    Contraseña:
                    <input type="password" required name="contrasena" id="contrasena" class="form-control" size="80" maxlength="80">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 text-center">
                <button type="submit" class="btn btn-danger">ENVIAR</button>
                </div>
            </div>
            </fieldset>
        </form>
        </div>
    </div>
</div>