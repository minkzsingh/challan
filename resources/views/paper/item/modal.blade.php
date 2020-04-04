
<!-- Model -->
<div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true" status='save'>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h2 class="modal-title" id="my-modal-title">Add item</h2>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="px-3">
                    <form class="form">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group p-lr-30">
                                    <label for="item_name">Item Name</label>
                                    <input type="text" id="item_name" class="form-control" name="item_name" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group p-lr-30">
                                    <label for="quantity">Stock</label>
                                    <input type="text" id="quantity" class="form-control" name="quantity" />
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-raised btn-raised btn-danger mr-1" data-dismiss="modal" <i class="ft-x"></i> Cancel
                </button>
                <button type="submit" class="btn btn-raised btn-raised btn-primary" id="save">
                    <i class="fa fa-check-square-o"></i> Save
                </button>
            </div>
        </div>
    </div>
</div>