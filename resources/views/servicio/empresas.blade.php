@extends('base')

@section('content')
	
	@include('layouts/nav-top-cliente')

	@include('layouts/nav-cliente')
	
<div class="container">
    <div id="main">

        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">
                    <i class="fa fa-rocket"></i> Empresas {{ $id_estado }} {{ $id_categoria }} 
                </h2>
            </div>
        </div>

        <!-- start:store list -->
        <div class="row" id="store-list">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="panel">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-5">
                                <a href="{{ url ('servicios/empresa/'.$id_estado.'/'.$id_categoria.'/key systems')}}"><img src="img/content/thumbnail1.jpg" class="img-responsive"></a>
                            </div>
                            <div class="col-sm-7">
                                <h4 class="title-store">
                                    <strong><a href="{{ url ('servicios/empresa/'.$id_estado.'/'.$id_categoria.'/key systems')}}">Key Systems</a></strong>
                                </h4>
                                <hr>
                                <p>Iki kie mung omah lodong dadiine rodo murah tur yo ra awet wong karang mung murah, nek pingin awet yo tuku omah-omahan wae sing ra iso rusak.</p>
                                <p>
                                    <a href="#" class="btn btn-default" disabled="" data-original-title="" title="">$12,990</a>
                                    <a href="#" class="btn btn-warning pull-right" data-original-title="" title="">Buy Now</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-5">
                                <a href="{{ url ('servicios/empresa/'.$id_estado.'/'.$id_categoria.'/banesco')}}"><img src="img/content/thumbnail10.jpg" class="img-responsive"></a>
                            </div>
                            <div class="col-sm-7">
                                <h4 class="title-store">
                                    <strong><a href="{{ url ('servicios/empresa/'.$id_estado.'/'.$id_categoria.'/banesco')}}">Banesco</a></strong> 
                                </h4>
                                <hr>
                                <p>Iki kie mung omah lodong dadiine rodo murah tur yo ra awet wong karang mung murah, nek pingin awet yo tuku omah-omahan wae sing ra iso rusak.</p>
                                <p>
                                    <a href="#" class="btn btn-default" disabled="" data-original-title="" title="">$12,990</a>
                                    <a href="#" class="btn btn-warning pull-right" data-original-title="" title="">Buy Now</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-5">
                                <a href="{{ url ('servicios/empresa/'.$id_estado.'/'.$id_categoria.'/adidas')}}"><img src="img/content/thumbnail2.jpg" class="img-responsive"></a>
                            </div>
                            <div class="col-sm-7">
                                <h4 class="title-store">
                                    <strong><a href="{{ url ('servicios/empresa/'.$id_estado.'/'.$id_categoria.'/adidas')}}">Adidas</a></strong>
                                </h4>
                                <hr>
                                <p>Iki kie mung omah lodong dadiine rodo murah tur yo ra awet wong karang mung murah, nek pingin awet yo tuku omah-omahan wae sing ra iso rusak.</p>
                                <p>
                                    <a href="#" class="btn btn-default" disabled="" data-original-title="" title="">$12,990</a>
                                    <a href="#" class="btn btn-warning pull-right" data-original-title="" title="">Buy Now</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-5">
                                <a href="{{ url ('servicios/empresa/'.$id_estado.'/'.$id_categoria.'/puma')}}"><img src="img/content/thumbnail5.jpg" class="img-responsive"></a>
                            </div>
                            <div class="col-sm-7">
                                <h4 class="title-store">
                                    <strong><a href="{{ url ('servicios/empresa/'.$id_estado.'/'.$id_categoria.'/puma')}}">Puma</a></strong>
                                </h4>
                                <hr>
                                <p>Iki kie mung omah lodong dadiine rodo murah tur yo ra awet wong karang mung murah, nek pingin awet yo tuku omah-omahan wae sing ra iso rusak.</p>
                                <p>
                                    <a href="#" class="btn btn-default" disabled="" data-original-title="" title="">$12,990</a>
                                    <a href="#" class="btn btn-warning pull-right" data-original-title="" title="">Buy Now</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="panel">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-5">
                                <a href="#"><img src="img/content/thumbnail9.jpg" class="img-responsive"></a>
                            </div>
                            <div class="col-sm-7">
                                <h4 class="title-store">
                                    <strong><a href="#">Omah Lodong</a></strong>
                                </h4>
                                <hr>
                                <p>Iki kie mung omah lodong dadiine rodo murah tur yo ra awet wong karang mung murah, nek pingin awet yo tuku omah-omahan wae sing ra iso rusak.</p>
                                <p>
                                    <a href="#" class="btn btn-default" disabled="" data-original-title="" title="">$12,990</a>
                                    <a href="#" class="btn btn-warning pull-right" data-original-title="" title="">Buy Now</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-5">
                                <a href="#"><img src="img/content/thumbnail1.jpg" class="img-responsive"></a>
                            </div>
                            <div class="col-sm-7">
                                <h4 class="title-store">
                                    <strong><a href="#">Omah Lodong</a></strong>
                                </h4>
                                <hr>
                                <p>Iki kie mung omah lodong dadiine rodo murah tur yo ra awet wong karang mung murah, nek pingin awet yo tuku omah-omahan wae sing ra iso rusak.</p>
                                <p>
                                    <a href="#" class="btn btn-default" disabled="" data-original-title="" title="">$12,990</a>
                                    <a href="#" class="btn btn-warning pull-right" data-original-title="" title="">Buy Now</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-5">
                                <a href="#"><img src="img/content/thumbnail10.jpg" class="img-responsive"></a>
                            </div>
                            <div class="col-sm-7">
                                <h4 class="title-store">
                                    <strong><a href="#">Omah Lodong</a></strong>
                                </h4>
                                <hr>
                                <p>Iki kie mung omah lodong dadiine rodo murah tur yo ra awet wong karang mung murah, nek pingin awet yo tuku omah-omahan wae sing ra iso rusak.</p>
                                <p>
                                    <a href="#" class="btn btn-default" disabled="" data-original-title="" title="">$12,990</a>
                                    <a href="#" class="btn btn-warning pull-right" data-original-title="" title="">Buy Now</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-5">
                                <a href="#"><img src="img/content/thumbnail2.jpg" class="img-responsive"></a>
                            </div>
                            <div class="col-sm-7">
                                <h4 class="title-store">
                                    <strong><a href="#">Omah Lodong</a></strong>
                                </h4>
                                <hr>
                                <p>Iki kie mung omah lodong dadiine rodo murah tur yo ra awet wong karang mung murah, nek pingin awet yo tuku omah-omahan wae sing ra iso rusak.</p>
                                <p>
                                    <a href="#" class="btn btn-default" disabled="" data-original-title="" title="">$12,990</a>
                                    <a href="#" class="btn btn-warning pull-right" data-original-title="" title="">Buy Now</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- start:pagination -->
            <!--<div class="col-lg-12">
                <ul class="pagination pagination-warning pagination-separated">
                    <li><a href="#">«</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li class="active"><a href="#">..</a></li>
                    <li><a href="#">32</a></li>
                    <li><a href="#">33</a></li>
                    <li><a href="#">»</a></li>
                </ul>
            </div>-->
            <!-- end:pagination -->
        </div>
        <!-- end:store list -->

    </div>
</div>

@endsection