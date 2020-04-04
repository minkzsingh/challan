@extends('paper.masters.layout')

@section('content')
<div class="fluid">
    <div id="wrapper">
        <div class="row">
            <div class="col-md-10 text-center font-weight-bold">
                <h3>Item Details</h3>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary pull-right" id="add_button">Add Item</button>
            </div>
        </div>
        <table class="table table-bordered" class="display row-border" id="table_id" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<!-- Add Model -->
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

<script>
    $(document).ready(function() {

        //Data Table
        var table = getTable({
            table_id: '#table_id',
            url: "api/item",
            data: {
                //user_id:12
            }
        });

        //Add
        $('#add_button').on('click', function() {
            $('#my-modal').modal('show');
        });

        $('#save').on('click', function() {
            var id = '',
                name = $('#item_name').val(),
                status = $('#my-modal').attr('status')
                quantity = $('#quantity').val(),
                url = 'api/item',
                type = 'POST';

            if (status == 'edit') {
                id = $('#my-modal').attr('row_id');
                url = 'api/item/' + id, type = 'PUT';
            }

            var data = {
                name: name,
                quantity: quantity
            };

            //Params == url, type(POST), request data, modal id to hide, table to reload
            saveData(url, type, data, "#my-modal", table, status);
        });

        //Edit
        $('#table_id tbody').on('click', 'button.edit', function() {
            var data = table.row($(this).parents('tr')).data();

            $('#my-modal').modal('show');
            $('#my-modal').attr('row_id', data.id).attr('status', 'edit');
            $('#my-modal-title').text('Edit Item');
            $('#item_name').val(data.name);
            $('#quantity').val(data.quantity);
            $('#save').text('Update');
        });

        //Delete 
        $('#table_id tbody').on('click', 'button.delete', function() {
            var data = table.row($(this).parents('tr')).data();

            //Params -- url, row id, table to reload
            deleteData('api/item/' + data.id, table);
        });
    });
</script>
@endsection