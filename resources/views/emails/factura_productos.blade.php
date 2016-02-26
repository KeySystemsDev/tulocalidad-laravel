<p>Ha realizado una compra</p>

<p>Información de Proveedor</p>	
<p>	Proveedor: {{$empresa->nombre_empresa}}</p>
<p>	Rif: {{$empresa->rif_empresa}}</p>
<p>	Correo eletrónico: {{$empresa->correo_empresa}}</p>
<p>	Sitio web: {{$empresa->web_empresa}}</p>
<p>	Dirección: {{$empresa->direccion_empresa}}</p>

<br>
	<p>Articulos adquiridos:</p>
	<ul>
@foreach($compra['productos_comprados'] as $articulo)

	<li> {{$articulo['nombre_producto']}}  - cantidad:  {{$articulo['cantidad_producto_comprados']}} - precio: {{$articulo['precio_unidad']}}BsF   - sub-total:  {{$articulo['precio_total']}} BsF</li>
@endforeach
</ul>


	<p>Tipo Pago: <span>{{$compra['tipo_pago_compra']}}</span></p>
	<p>Factura:<span>{{$compra['identificador_pago_compra']}}</span></p>
	<p>Total: <span>{{$compra['precio_total_compra']}} BsF</span></p>


Datos de factura:
@if($compra['factura'])
	<p>N° de Factura: {{$compra['factura']['identificador_factura']}}</p>
	<p>A nombre de: {{$compra['factura']['a_nombre_de']}}</p>
	<p>Rif / Cedula: {{$compra['factura']['rif_usuario']}}</p>
	<p>Telefono: {{$compra['factura']['telefono']}}</p>
	<p>Direccion Fiscal: {{$compra['factura']['telefono']}}</p>
@endif