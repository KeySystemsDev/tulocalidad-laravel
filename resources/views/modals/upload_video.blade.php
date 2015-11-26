<!-- Modal -->
<div class="modal fade .bs-example-modal-lg" id="myModal_video" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-picture-o"></i> Elige un video</h4>
            </div>
            <div class="modal-body">
                <div >
                    <form action="registro" novalidate>
                        <div class = "row">
                        </div>
                        <div class = "row">
                            
                            <div class="col-xs-3 col-xs-offset-2">url del video:</div>
                            <div class="col-xs-2">
                                <input name="i_video" ng-model="video_url" id="i_video" />
                            </div>
                        </div>
                        <br>
                        <center>
                            Solo se admiten enlaces de youtube.
                        </center>                        
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" ng-click="validar_video(video_url)">Guardar video</button>
            </div>
        </div>
    </div>
</div>