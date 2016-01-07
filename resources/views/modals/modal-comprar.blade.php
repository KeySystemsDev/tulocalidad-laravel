<div class="modal fade bs-example-modal-lg" id="modal_compra" labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-sm">
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
                            <div class="col-md-2 col-md-offset-3">
                            	<input type="radio" name="forma_pago" value="mercadopago" checked>
                            </div>
                            <div class="col-md-4">
                            	<img class="img-mercado-pago" src="{{ url('img/mercado-pago/mercado-pago.jpg') }}">
                            </div>
                            <input type="hidden" name="id_empresa" ng-value="id_empresa">
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