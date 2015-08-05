@extends('base')

@section('content')
	
	@include('layouts/nav-top')

	@include('layouts/nav')

	<div class="container">
		<div id="main">

			<ol class="breadcrumb">
                <li><a href="#">Servicos</a></li>
                <li><a href="#">Estados</a></li>
                <li class="active">Categorias</li>
            </ol>

			<div class="row">           
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading center">
                            <img class="img-registrar-logo" src="{{ asset('public/img/tulocalidad.png') }}">
                        	<div class="row">
                                <div class="col-lg-6 col-md-6 msn-no-empresa">
                                    <div class="well well-danger well-borde">
                                        Sin Resulado Encontrados. 
                                    </div>
                                </div>
                            </div>
                        </header>
                    </section>
                </div>
            </div>

		</div>
	</div>

    @include('layouts/footer')

@endsection