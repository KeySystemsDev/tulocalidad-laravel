<div class="modal fade bs-example-modal-lg" id="solicitud_servicio" labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Solitud de Servicio</h4>
			</div>
			<div ng-init="url='{{url()}}/'"></div>
			<div ng-init="urlRedirect='{{ url('/contratos')}}'"></div>
			<form class="form-horizontal" name="formulario" id="formulario" ng-action="[[urlAction]]" method="POST">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="id_servicio" ng-value="servicio.id_servicio">
				
				<div class="modal-body" >
					<div class="form-group">
	                    <label class="col-md-4 control-label">Detalle de Solicitud</label>
	                    <div class="col-md-5">
	                    	<textarea rows="15" class="form-control" name="texto_solicitud" ng-model="servicio.texto_solicitud" ng-required="true"></textarea>
	                    	<div class="error campo-requerido" ng-show="formulario.texto_solicitud.$invalid && (formulario.texto_solicitud.$touched || submitted)">
	                            <small class="error" ng-show="formulario.texto_solicitud.$error.required">
	                                * Campo requerido.
	                            </small>
	                    	</div>
	                    </div>
	                </div>
				</div>
				<div class="modal-footer">
					<a href="javascript:;" class="btn btn-sm btn-danger btn-sm-carrito" data-dismiss="modal">Cerrar</a>
					<button type="button" ng-click="submit(formulario.$valid)" class="btn btn-success btn-sm-carrito">Enviar</button>
				</div>
			</form>
		</div>
	</div>
</div>