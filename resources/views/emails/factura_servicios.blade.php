<p>Ha realizado un Contrato</p>

<p>Información de Proveedor</p>	
<p>	Proveedor: $empresa->nombre_empresa</p>
<p>	Rif: $empresa->rif_empresa</p>
<p>	Correo eletrónico: $empresa->correo_empresa</p>
<p>	Sitio web: $empresa->web_empresa</p>
<p>	Dirección: $empresa->direccion_empresa</p>

<br>
	<p>Servicio adquirido:</p>
	<ul>
		<li> {{$solicitud['servicio']['nombre_servicio']}}  </li>
	</ul>


	<p>Total <span>{{$solicitud['monto_final_solicitud']}} BsF</span></p>


Datos de factura:
@if($solicitud['factura'])
	<p>N° de Factura: {{$solicitud['factura']['identificador_factura']}}</p>
	<p>A nombre de: {{$solicitud['factura']['a_nombre_de']}}</p>
	<p>Rif / Cedula: {{$solicitud['factura']['cedula_rif']}}</p>
	<p>Telefono: {{$solicitud['factura']['telefono']}}</p>
	<p>Direccion Fiscal: {{$solicitud['factura']['telefono']}}</p>
@endif