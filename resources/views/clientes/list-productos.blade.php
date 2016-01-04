@extends('base-cliente')

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
	
	@include('layouts/navbar-cliente')
	
	<br><br>

	<section id="advertisement">
		<div class="container">
			<img src="{{ asset('/cart/Eshopper/images/shop/advertisement.jpg') }}" alt="">
		</div>
	</section>

	<div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{ url('/') }}">Incio <i class="fa fa-angle-right"></i></a></li>
                            <li><a href="javascript:;">Lista de Productos</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	<section>
		<div class="container">
			<div class="row">
				@include('layouts/categorias-cliente')
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Lista de Productos</h2>

						@foreach($productos as $producto)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<a href="{{ url('detalle-producto') }}">
											<img src="{{ url('/uploads/productos/low/'.$producto->primera_imagen['nombre_imagen_producto']) }}" alt="">
										</a>
										<h2>{{$producto->precio_producto}} BsF</h2>
										<p>{{$producto->nombre_producto}}n</p>
										<a href="{{ url( '/agregar-carrito/'.$producto->id_producto) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>

	@include('layouts/footer-cliente')

</div>
@endsection
