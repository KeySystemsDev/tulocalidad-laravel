@extends('base')

@section('content')
	
	@include('layouts/nav-top-cliente')

	@include('layouts/nav-cliente')

<div class="container" ng-controller="DetalleEmpresaController">
    <div id="main">

        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">
                    Empresa {{ $id_empresa }}
                </h2>
            </div>
        </div>

        <!-- start:real estates detail -->
        <div class="row" id="real-estates-detail">
            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <header class="panel-title">
                            <div class="text-center">
                                <strong>Agent</strong> Author<strong>.</strong>
                            </div>
                        </header>
                    </div>
                    <div class="panel-body">
                        <div class="text-center" id="author">
                            <img src="{{ asset('/img/user/avatar-3.jpg') }}">
                            <h3>John Doe</h3>
                            <small class="label label-warning">From USA</small>
                            <p>Aku kie sing sok ngedolke omah-omah kae, yo iso di omongke makelar ngono sih. Tapi makelar nek payu ne akeh yo dadi sugih bro. Tenanan ra ngapusi.</p>
                            <p class="sosmed-author">
                                <a href="#"><i class="fa fa-facebook" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus" data-toggle="tooltip" data-placement="top" title="" data-original-title="Google Plus"></i></a>
                                <a href="#"><i class="fa fa-linkedin" data-toggle="tooltip" data-placement="top" title="" data-original-title="Linkedin"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-xs-12">
                <div class="panel">
                    <div class="panel-body">
                        <ul id="myTab" class="nav nav-pills">                          
                            <li class="active"><a href="#detail" data-toggle="tab">Detalle</a></li>
                            <li class=""><a href="#contact" data-toggle="tab">Contacto</a></li>
                            <li class=""><a href="#photos" data-toggle="tab">Ubicación</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade" id="photos">  
                                <div class="col-lg-12">
                                    <section class="panel">
                                        <header class="panel-heading">
                                            <div id="map_canvas">
                                                <ui-gmap-google-map 
                                                    center="map.center" 
                                                    zoom="map.zoom" 
                                                    draggable="true" 
                                                    options="options">
                                                        <ui-gmap-marker 
                                                            coords="marker.coords" 
                                                            options="marker.options"
                                                            events="marker.events" 
                                                            idkey="marker.id">
                                                        </ui-gmap-marker>
                                                </ui-gmap-google-map>
                                            </div>
                                    </section>
                                </div>
                            </div>
                            <div class="tab-pane fade active in" id="detail">
                                <p></p>
                                <h4>Short Detail</h4>
                                <p>Iki mung detail singkat wae soale seko jenenge wae wis short detail dadi yo ojo dowo-dowo.</p>
                                <table class="table table-th-block">
                                    <tbody>
                                        <tr><td class="active">Bedrooms:</td><td>5 beds</td></tr>
                                        <tr><td class="active">Bathrooms:</td><td>2 baths</td></tr>
                                        <tr><td class="active">Single Family:</td><td>2,957 sq ft</td></tr>
                                        <tr><td class="active">Lot:</td><td>0.26 acres</td></tr>
                                        <tr><td class="active">Year Built:</td><td>1998</td></tr>
                                        <tr><td class="active">Last Sold:</td><td>Apr 1998 for $225,000</td></tr>
                                        <tr><td class="active">Heating Type:</td><td><a href="#">Contact for details</a></td></tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="contact">
                                <p></p>
                                <form role="form">
                                    <div class="form-group">
                                        <label>Full name</label>
                                        <input type="text" class="form-control rounded" placeholder="Enter full name">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone number</label>
                                        <input type="text" class="form-control rounded" placeholder="(000)0000000">
                                    </div>
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" class="form-control rounded" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Buy this property
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Message to agent</label>
                                        <textarea class="form-control rounded" style="height: 100px;"></textarea>
                                        <p class="help-block">Please be polite and professional</p>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger" data-original-title="" title="">Send message</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end:real estates detail -->

    </div>
</div>

@endsection