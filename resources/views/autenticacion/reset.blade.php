@extends('base-admin')

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
	
	@include('layouts/navbar-admin')

    @include('layouts/sidebar-admin')
	
	<div id="content" class="content ng-scope">

        <h1 class="page-header"><i class="fa fa-key"></i> Cambiar contraseña </h1>

        <div class="row">
	        <!-- begin col-12 -->
	        <div class="col-12 ui-sortable">
	            <!-- begin panel -->
	            <div class="panel panel-inverse">
	                <div class="panel-heading">
	                    <div class="panel-heading-btn">
	                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand" data-original-title="" title=""><i class="fa fa-expand"></i></a>
	                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse" data-original-title="" title=""><i class="fa fa-minus"></i></a>
	                    </div>
	                    <h4 class="panel-title">Contraseña</h4>
	                </div>

	                <div class="panel-body">

						<form class="form-horizontal" role="form" method="POST" action="{{ url('/reset-password') }}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">

							<div class="form-group">
								<label class="col-md-3 control-label">Contraseña Actual</label>
								<div class="col-md-6">
									<input type="password" class="form-control" name="old-password">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Nueva Contraseña</label>
								<div class="col-md-6">
									<input type="password" class="form-control" name="password">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Confirmar nueva Contraseña</label>
								<div class="col-md-6">
									<input type="password" class="form-control" name="password_confirmation">
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<button type="submit" class="btn btn-success">
										Resetear Contraseña <i class="fa fa-key"></i>
									</button>
								</div>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>

	</div>
</div>
				