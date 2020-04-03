@extends('paper.masters.layout')

@section('content')
<div class="fluid">
    <div id="wrapper">
        <div class="row">
            <div class="col-md-10 text-center font-weight-bold">
                <h3>Item Details</h3>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary pull-right" id="add_button" data-toggle="modal"
                    data-target="#my-modal">Add Item</button>
            </div>
        </div>
        <table class="table table-bordered" class="display row-border" id="table_id" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Created Time</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach(\App\Item::all() as $item)
                <tr>
                    <th>{{ $item->id }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <a class="glyphicon glyphicon-edit ml-2 edit_modal"></a>
                        <a class="glyphicon glyphicon-trash ml-2"></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Add Model -->
<div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Title</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="px-3">
                    <form class="form">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="projectinput1">Item Name</label>
                                    <input type="text" id="projectinput1" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="projectinput1">Stock</label>
                                    <input type="text" id="projectinput1" class="form-control" />
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="button" class="btn btn-raised btn-raised btn-danger mr-1">
                                <i class="ft-x"></i> Cancel
                            </button>
                            <button type="submit" class="btn btn-raised btn-raised btn-primary">
                                <i class="fa fa-check-square-o"></i> Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                Footer
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#table_id').DataTable({
        "sScrollY": "200px",
        "bScrollCollapse": true,
        "bJQueryUI": true,
        "aoColumnDefs": [{
            "sWidth": "10%",
            "aTargets": [-1]
        }]
    });

    $('.edit_modal').on('click', function() {
        $('#my-modal').modal('show');
    });
});
</script>
@endsection