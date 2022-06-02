<div class="col-12 col-md-3 p-4">
    <div class="card shadow" data-aos="flip-left">
        <img src="imagenes/hawaiana.webp" class="card-img-top" alt="Pizza">
        <div class="card-body text-center">
        <h5 class="card-title"><?=$registro["txt_nombre_pro"]?> <strong class="text-danger">$<?=$registro["num_precio_pro"]?></strong></h5>
        <a href="?seccion=pedidos&accion=agregar&idProducto=<?=$registro["pk_clave_pro"]?>" class="btn btn-warning hvr-grow">Agregar a mi pedido</a>
        </div>
    </div>
</div>