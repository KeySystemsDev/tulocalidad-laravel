<div class="modal fade bs-example-modal-lg" id="por_responder" labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title"> Repuesta al Cliente </h4>
			</div>
			<div ng-init="url='{{url()}}/'"></div>
			
			<form class="form-horizontal" name="formulario" id="formulario" ng-action="[[urlAction]]" method="POST">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="id_servicio" ng-value="producto.id_servicio">

				<div class="modal-body">

					<div class="form-group">
	                    <label class="col-md-4 control-label">Monto presupuesto</label>
	                    <div class="col-md-5">
	                    	<input  numbers-only class="form-control" name="monto_final_solicitud" ng-model="servicio.monto_final_solicitud" ng-required="true">
	                    	<div class="error campo-requerido" ng-show="formulario.monto_final_solicitud.$invalid && (formulario.monto_final_solicitud.$touched || submitted)">
	                            <small class="error" ng-show="formulario.monto_final_solicitud.$error.required">
	                                * Campo requerido.
	                            </small>
	                    	</div>
	                    </div>
	                </div>

	                <div class="form-group">
	                    <label class="col-md-4 control-label">Fecha limite</label>
	                    <div class="col-md-5">
	                    	<input id="daterangepicker" class="form-control" name="fecha_vencimiento_solicitud" ng-model="servicio.fecha_vencimiento_solicitud" ng-required="true">
	                    	<div class="error campo-requerido" ng-show="formulario.fecha_vencimiento_solicitud.$invalid && (formulario.fecha_vencimiento_solicitud.$touched || submitted)">
	                            <small class="error" ng-show="formulario.fecha_vencimiento_solicitud.$error.required">
	                                * Campo requerido.
	                            </small>
	                    	</div>
	                    </div>
	                </div>
					
					<div class="form-group">
	                    <label class="col-md-4 control-label">Detalle de solicitud</label>
	                    <div class="col-md-5">
	                    	<textarea rows="10" class="form-control" name="texto_presupuesto_solicitud" ng-model="servicio.texto_presupuesto_solicitud" ng-required="true"></textarea>
	                    	<div class="error campo-requerido" ng-show="formulario.texto_presupuesto_solicitud.$invalid && (formulario.texto_presupuesto_solicitud.$touched || submitted)">
	                            <small class="error" ng-show="formulario.texto_presupuesto_solicitud.$error.required">
	                                * Campo requerido.
	                            </small>
	                    	</div>
	                    </div>
	                </div>
				
				</div>
				<div class="modal-footer">
					<a href="javascript:;" class="btn btn-danger btn-sm-carrito" data-dismiss="modal">Cerrar</a>
					<button type="button" ng-click="submit(formulario.$valid)" class="btn btn-success btn-sm-carrito">Enviar</button>
				</div>
			</form>
		</div>
	</div>
</div>