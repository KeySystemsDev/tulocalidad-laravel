<p>Ha realizado una compra:</p>

	<p>Articulos:</p>
@foreach($compra['productos_comprados'] as $compra)

	<p> {{$articulo['nombre_producto']}}  -   {{$articulo['cantidad_producto_comprados']}} X {{$articulo['precio_unidad']}}   -   {{$articulo['precio_total']}}</p>

@endforeach


<ul>
	<li>Tipo Pago <span>{{$compra['tipo_pago_compra']}}</span></li>
	<li>Factura<span>{{$compra['identificador_pago_compra']}}</span></li>
	<li>Total <span>{{$compra['precio_total_compra']}} BsF</span></li>
</ul>


Datos de factura:
@if($articulo['factura'])
	<p>N° de Factura: $articulo['factura']['identificador_factura']</p>
	<p>A nombre de: $articulo['factura']['a_nombre_de']</p>
	<p>Rif / Cedula: $articulo['factura']['rif_usuario']</p>
	<p>Telefono: $articulo['factura']['telefono']</p>
	<p>Direccion Fiscal: $articulo['factura']['telefono']</p>
@endif