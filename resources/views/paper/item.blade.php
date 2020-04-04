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
                <!-- @foreach(\App\Item::all() as $item)
                <tr>
                    <th>{{ $item->id }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <a class="ml-2 edit_modal"><i class="glyphicon glyphicon-edit"></i></a>
                        <a class="ml-2 delete_modal"><i class="glyphicon glyphicon-trash"></i></a>
                    </td>
                </tr>
                @endforeach -->
            </tbody>
        </table>
    </div>
</div>

<!-- Add Model -->
<div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
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
                                    <label for="name">Item Name</label>
                                    <input type="text" id="name" class="form-control" name="item_name" />
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
        var table = $('#table_id').DataTable({
            bScrollCollapse: true,
            bJQueryUI: true,
            aoColumnDefs: [{
                sWidth: "16%",
                aTargets: [-1]
            }], 
            ajax: {
                url: "api/item",
                data: {}
            },
            columns: [{
                    data: "id"
                },
                {
                    data: "name"
                },
                {
                    data: "quantity"
                },
                {
                    mRender: function(data, type, row) {
                        return '<button type="button" class="btn btn-primary edit" style="width: 60px;margin-right:10px;">Edit</button><button type="button" class="btn btn-danger delete" style="width: 80px;">Delete</button>';
                    }
                }
            ]

        });

        //Add
        $('#add_button').on('click', function() {
            $('#my-modal').modal('show');
        });

        $('#save').on('click', function() {
            var name = $('#name').val(),
                quantity = $('#quantity').val();

            $.ajax({
                url: 'api/item',
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    name: name,
                    quantity: quantity
                },
                complete: function() {
                    $('#my-modal').modal('hide');
                    table.ajax.reload();
                },
                success: function(res) {
                    console.log(res)
                }
            });
        });

        //Edit
        
        $('#table_id tbody').on('click', 'button.edit', function() {
            var data = table.row($(this).parents('tr')).data();
            console.log(data);

            alert(data.name + "'s salary is: " + data.quantity);
        });

        //Delete
        $('#table_id tbody').on('click', 'button.delete', function() {
            var data = table.row($(this).parents('tr')).data();
            $.ajax({
                url: 'api/item/' + data.id,
                type: 'DELETE',
                data: {
                    _token: "{{ csrf_token() }}",
                },
                complete: function() {
                    $('#my-modal').modal('hide');
                    table.ajax.reload();
                },
                success: function(res) {
                    console.log(res)
                }
            });
        });
    });
</script>
@endsection