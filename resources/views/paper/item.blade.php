@extends('paper.masters.layout')

@section('content')
<div id="wrapper">
    <div class="row">
        <div class="col-md-10 text-center font-weight-bold">
            <h3>Item Details</h3>
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary pull-right">Add Item</button>
        </div>
    </div>
    <table class="table table-striped table-bordered" id="table_id" style="width:100%">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
            </tr>
        </tbody>
    </table>
    </di>
    <script>
    $(document).ready(function() {
        $('#table_id').DataTable();

        $('.dataTables_length').addClass('bs-select');
    });
    </script>
    @endsection