<center>Nueva Campaña Publicitaria para la empresa: "{{$nombre->nombre_empresa}}"
<form action="../publicidad-creado" method="post" name="publicidad" enctype="multipart/form-data">
<input type="hidden" name="id_empresa"><br>
<label>Titulo:</label>
<input type="textname" name="i_titulo"><BR>
<label>Descripcion de la Campaña:</label>
<textarea cols=20 rows=3 name="i_descripcion"></textarea> <BR>
<label>Imagen de la Publicidad:</label>
<input type="file" name="i_publicidad"/><br>
<input type="submit" name="agregar" value"Agregar">
</form>
</center>