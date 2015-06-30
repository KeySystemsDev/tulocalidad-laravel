@extends('base')

@section('content')
    
    @include('layouts/nav-top')

    @include('layouts/nav')

    <div class="container">
        <div id="main">

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <div class="col-lg-12">
                                <section class="panel">
                                    <header class="panel-heading center">
                                        <img class="img-registrar-logo" src="{{ asset('/img/tulocalidad.png') }}">
                                        <h2>
                                            Publicidad
                                        </h2>
                                        <p>
                                            Editar Publicidad
                                        </p>
                                    </header>
                                </section>
                            </div>
                        </header>

<center><h1>Agregar Publicidad --> {{ $id_publicidad}}</h1></center>

					</section>
                </div>

            </div>

        </div>
    </div>
@endsection