<div class="container-fluid">
    <div class="container my-5">
        <div class="row">
            <div class="col-12 text-center">
                    <h1>INGRESA A TU CUENTA</h1>
            </div>
        </div>
		<?php
		if(isset($_GET["mensaje"]))
		{
		?>
			<div class="row">
				<div class="col-12">
					<div class="alert alert-warning">
						<a href="#" class="close" data-dismiss="alert">&times;</a>
						<strong>Por favor verifique su usuario y/o contraseña.</strong> Intente nuevamente.
					</div>
				</div>
			</div>
		<?php } ?>
		<div class="row">
			<div class="col-12 p-3 p-md-5">
				<form id="formulario" class="ingresa" action="?seccion=acceso&amp;accion=valida" method="post">
				<fieldset>
					<div class="row">
						<div class="col-12 text-center">
							<p>
								Accesa a nuestro sistema por medio de tu usuario y contraseña
							</p> 
						</div>
					</div>
					<div class="row p-2">
						<div class="col-md-4"></div>
						<div class="col-12 col-md-4"><input type="text" required name="correo" id="correo" class="form-control shadow-sm" placeholder="Usuario"/></div>
						<div class="col-md-4"></div>
					</div>
					<div class="row p-2">
						<div class="col-md-4"></div>
						<div class="col-12 col-md-4"><input type="password" required name="contrasena" id="contrasena" class="form-control shadow-sm" placeholder="Contraseña"></div>
						<div class="col-md-4"></div>
					</div>
					<div class="row p-2">
						<div class="col-md-4"></div>
						<div class="col-12 col-md-4 text-center"><button type="submit" class="btn btn-danger hvr-grow">Accesar</button></div>
						<div class="col-md-4"></div>
					</div>
				</fieldset>
				</form>
				<div class="row">
					<div class="col-md-12 text-center">
						<p class="mt-3"><a href="?seccion=acceso&accion=recordar" class="text-danger">¿Olvidaste tu contraseña?</a></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 text-center">
						<p class="mt-3"><a href="?seccion=acceso&accion=registrar" class="text-danger">¿Eres nuevo? Regístrate aquí</a></p>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
