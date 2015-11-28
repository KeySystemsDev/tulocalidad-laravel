<div class="modal fade bs-example-modal-sm" id="ModalConfimacion" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">[[titulo_m_confirmacion]]</h4>
            </div>
            <div class="modal-body">
                <div class="col-xs-12"> [[mensaje_m_confirmacion]] </div>
            </div>
            <br>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-xs-6">
                        <button type="button" class="btn btn-danger btn-block btn-flat" data-dismiss="modal" aria-label="Close">No</button>
                    </div>
                    <div class="col-xs-6">
                        <button type="button" class="btn btn-primary btn-block btn-flat" data-dismiss="modal" ng-click="ejecutar(parameters)">Si</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>