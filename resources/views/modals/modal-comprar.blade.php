<div class="modal fade bs-example-modal-lg" id="modal_compra" labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title"><i class="fa fa fa-shopping-cart"></i> Formato de Pago</h4>
			</div>
			<form class="form-horizontal" name="formulario" id="formulario" action="{{ url('comprar/mercadopago') }}" method="POST">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="modal-body">
					<div class="row">
						<br>
						<div class="form-group">
                            <div class="col-md-1 col-md-offset-3">
                            	<input type="radio" name="forma_pago" value="mercadopago" checked>
                            </div>
                            <div class="col-md-4">
                            	<img class="img-mercado-pago-2" src="{{ url('img/mercado-pago/mercado-pago.jpg') }}">
                            </div>
                            <input type="hidden" name="id_empresa" ng-value="id_empresa">
                        </div>
					</div>

					<div ng-if="check==1">

						<div class="form-group">
		                    <label class="col-md-6 control-label">Datos de Facturación</label>
		                </div>

						<div class="form-group">
		                    <label class="col-md-4 control-label">Nombre y Apellido</label>
		                    <div class="col-md-5">
		                    	<input type="text" class="form-control" name="nombre_usuario" ng-model="servicio.nombre_usuario" ng-required="true" oninvalid="setCustomValidity(' ')">
		                    	<div class="error campo-requerido" ng-show="formulario.nombre_usuario.$invalid && (formulario.nombre_usuario.$touched || submitted)">
		                            <small class="error" ng-show="formulario.nombre_usuario.$error.required">
		                                * Campo requerido.
		                            </small>
		                    	</div>
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label class="col-md-4 control-label">Correo Electrónico</label>
		                    <div class="col-md-5">
		                    	<input type="email" class="form-control" name="correo_usuario" ng-model="servicio.correo_usuario" ng-required="true" oninvalid="setCustomValidity(' ')">
		                    	<div class="error campo-requerido" ng-show="formulario.correo_usuario.$invalid && (formulario.correo_usuario.$touched || submitted)">
		                            <small class="error" ng-show="formulario.correo_usuario.$error.required">
		                                * Campo requerido.
		                            </small>
		                    	</div>
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label class="col-md-4 control-label">Telefono</label>
		                    <div class="col-md-5">
		                    	<input class="form-control" name="telefono_usuario" ng-model="servicio.telefono_usuario" ng-required="true" oninvalid="setCustomValidity(' ')">
		                    	<div class="error campo-requerido" ng-show="formulario.telefono_usuario.$invalid && (formulario.telefono_usuario.$touched || submitted)">
		                            <small class="error" ng-show="formulario.telefono_usuario.$error.required">
		                                * Campo requerido.
		                            </small>
		                    	</div>
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label class="col-md-4 control-label">CI. RIF</label>
		                    <div class="col-md-5">
		                    	<input class="form-control" name="rif_usuario" ng-model="servicio.rif_usuario" ng-required="true" oninvalid="setCustomValidity(' ')">
		                    	<div class="error campo-requerido" ng-show="formulario.rif_usuario.$invalid && (formulario.rif_usuario.$touched || submitted)">
		                            <small class="error" ng-show="formulario.rif_usuario.$error.required">
		                                * Campo requerido.
		                            </small>
		                    	</div>
		                    </div>
		                </div>
						
						<div class="form-group">
		                    <label class="col-md-4 control-label">Dirección</label>
		                    <div class="col-md-5">
		                    	<textarea rows="7" class="form-control" name="direccion_usuario" ng-model="servicio.direccion_usuario" ng-required="true" oninvalid="setCustomValidity(' ')"></textarea>
		                    	<div class="error campo-requerido" ng-show="formulario.direccion_usuario.$invalid && (formulario.direccion_usuario.$touched || submitted)">
		                            <small class="error" ng-show="formulario.direccion_usuario.$error.required">
		                                * Campo requerido.
		                            </small>
		                    	</div>
		                    </div>
		                </div>          
				</div>
				<div class="modal-footer">
					<a href="javascript:;" class="btn btn-sm btn-sm-carrito btn-danger" data-dismiss="modal">Cerrar</a>
					<button type="submit" class="btn btn-sm  btn-sm-carrito btn-success">Comprar</button>
				</div>
			</form>
		</div>
	</div>
</div