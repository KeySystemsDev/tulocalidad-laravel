<div class="modal fade .bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-picture-o"></i> Agregar imagen</h4>
            </div>
            <div class="modal-body">
                <div class = "row">
                    <div class="col-12">
                        <div class="center">
                            <span class="btn btn-success btn-file"><i class="fa fa-picture-o"></i> Seleccione un archivo
                            <input type="file" name="i_image" accept=".jpg,.png" file-model="myFile" id="fileInput"/>
                            </span>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">

                    <div class="col-xs-5 col-xs-offset-1 text-img-cortar">
                        <i class="fa fa-file-image-o"></i>Imagen original
                    </div>
                    <div class="col-xs-5 col-xs-offset-1 text-img-cortar">
                        <i class="fa fa-scissors"></i>Recorte
                    </div>
                    <div class="cropArea col-xs-5 col-xs-offset-1">
                        <img-crop area-type="square" image="myImage" result-image-size="700" result-image-quality="1" result-image='srcimg' ></img-crop>

                    </div>
                    <div class="col-xs-5 col-xs-offset-1">
                        <div><img class="view-modal-img" ng-src="[[srcimg]]"/></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" ng-disabled="disable===true" class="btn btn-primary" data-dismiss="modal" ng-click="return_img(img_select)">
                    Guardar
                </button>                   
            </div>
        </div>
    </div>
</div>