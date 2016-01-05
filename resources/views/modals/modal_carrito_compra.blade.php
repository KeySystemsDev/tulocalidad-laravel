<div class="modal fade bs-example-modal-lg" id="modal_carrito_compra" labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title"><i class="fa fa fa-shopping-cart"></i> Carrito</h4>
			</div>
			<form class="form-horizontal" name="formulario" id="formulario" action="{{ url('agregar-carrito') }}" method="POST">
				<div class="modal-body">
	                <div class="row">
	                	<div class="col-md-3">
	                		<img ng-src="[[url + 'uploads/productos/low/' + producto.primera_imagen.nombre_imagen_producto]]">
	                	</div>
	                	<div class="col-md-5">
	                		<div class="media-body">
		                        <h5 class="media-heading nombre-carrito-detalle-modal">[[producto.nombre_producto | limitTo:letterLimit]]</h5>
		                        <div class="text-muted f-s-11 price-carrito-detalle-modal">[[producto.precio_producto]] Bs</div>
	                    	</div>
	                	</div>
	                	<input type="hidden" name="id_producto" ng-value="producto.id_producto">
	                	<div class="col-md-4">
	                		<div class="select-cantidad-producto">
		                		<select class="form-control" name="cantidad_producto">
									<option class="option" value="1" selected>1</option>
									<option class="option" value="2">2</option>
									<option class="option" value="3">3</option>
									<option class="option" value="4">4</option>
									<option class="option" value="5">5</option>
								</select>
							</div>
	                	</div>
	                </div>        
				</div>
				<div class="modal-footer">
					<a href="javascript:;" class="btn btn-sm btn-sm-carrito btn-danger" data-dismiss="modal">Cerrar</a>
					<button type="submit" class="btn btn-sm  btn-sm-carrito btn-success">Agregar</button>
				</div>
			</form>
		</div>
	</div>
</div