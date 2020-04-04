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

@include('paper.item.modal')

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