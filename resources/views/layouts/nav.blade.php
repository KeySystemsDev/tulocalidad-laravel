<div id="header">
    <div class="overlay">
        <nav class="navbar" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="btn-block btn-drop navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <strong>MENU</strong>
                    </button>
                </div>
            
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="{{ url ('misempresas/listar') }}">
                                <div class="text-center">
                                    <i class="fa fa-search fa-3x" data-original-title="" title=""></i><br>
                                    Empresas
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url ('misempresas/agregar') }}">
                                <div class="text-center">
                                    <i class="fa fa-pencil-square-o fa-3x" data-original-title="" title=""></i><br>
                                    Agregar Empresa
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url ('mispublicidades/listar-publicidad/2') }}">
                                <div class="text-center">
                                    <i class="fa fa-search fa-3x" data-original-title="" title=""></i><br>
                                    Publicidad
                                </div>
                            </a>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </nav>
    </div>
</div>