<div class="modal fade" id="labmodal" tabindex="-1" aria-labelledby="labmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <form id="form" action="savelab" method="post" enctype="multipart/form-data">
                                        <?= csrf_field(); ?>
                                        <div class="row mb-4">
                                            <div class="col">                                   
                                                <label class="form-label" for="nd">Nama depan</label>
                                                <input type="text" id="nd" name="namadepan" class="form-control" />
                                                <div class="invalid-feedback" id="errornd"></div>
                                            </div>
                                            <div class="col">
                                                <label class="form-label" for="nb">Nama belakang</label>
                                                <input type="text" id="nb" name="namabelakang" class="form-control" />
                                                <div class="invalid-feedback" id="errornb"></div>                                    
                                            </div>
                                        </div>
                    </form>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
        </div>
    </div>
</div>