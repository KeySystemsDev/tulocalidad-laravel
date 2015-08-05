@extends('base')
@if ($codigo == 1)
	<h1>Usuario Habilitado Satisfactoriamente</h1>
@endif

@if ($codigo == 2)
	<h1>Codigo Usado. Usuario ya fue habilitado</h1>
@endif

@if ($codigo == -1)
	<h1>Codigo invalido</h1>
@endif
