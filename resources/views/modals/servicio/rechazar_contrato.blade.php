<div class="modal fade bs-example-modal-lg" id="rechazar_contrato" labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title"><i class="fa fa-file-text"></i> Rechazar Presupuesto</h4>
			</div>
			<form class="form-horizontal" name="formulario" id="formulario" action="[[urlAction]]" method="POST">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="modal-body">
	                <div class="row">
						<center><h6>¿Está seguro que desea rechazar la solicitud de contrato?</h6></center>
	               	</div>     
				</div>
				<div class="modal-footer">
					<a href="javascript:;" class="btn btn-sm btn-sm-carrito btn-danger" data-dismiss="modal">No</a>
					<button type="button" ng-click="submit(formulario.$valid)" class="btn btn-sm  btn-sm-carrito btn-success">Si</button>
				</div>
			</form>
		</div>
	</div>
</div>