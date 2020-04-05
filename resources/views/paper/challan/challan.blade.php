@extends('paper.masters.layout')

@section('content')
<div class="fluid">
    <div id="wrapper">
        <div class="row">
            <div class="col-md-10 text-center font-weight-bold">
                <h3>Challan Details</h3>
            </div>
            <!-- <div class="col-md-2">
                <button class="btn btn-primary pull-right" id="add_button">Add Item</button>
            </div> -->
        </div>
        <table class="table table-bordered" class="display row-border" id="table_id" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">Challan ID</th>
                    <th scope="col">Company Name</th>
                    <th scope="col">Total Amount</th>
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
        url: "api/challan",
        data: { //user_id:12
        }
    });

});
</script>
@endsection