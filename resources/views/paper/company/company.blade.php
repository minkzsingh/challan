@extends("paper.masters.layout")

@section("content")
<div class="fluid">
    <div id="wrapper">
        <div class="row">
            <div class="col-md-10 text-center font-weight-bold">
                <h3>Company Details</h3>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary pull-right" id="add_button">Add Company</button>
            </div>
        </div>
        <table class="table table-bordered" class="display row-border" id="table_id" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

@include("paper.company.modal")

<script>
$(document).ready(function() {

    //Data Table
    var table = getTable({
        table_id: "#table_id",
        url: "api/company",
        data: { //user_id:12
        }
    });

    //Add
    $("#add_button").on("click", function() {
        $("#my-modal").modal("show");
    });

    $("#save").on("click", function() {
        var id = "",
            name = $("#company_name").val(),
            status = $("#my-modal").attr("status"),
            url = "api/company",
            type = "POST";

        if (status == "edit") {
            id = $("#my-modal").attr("row_id");
            url = "api/company/" + id, type = "PUT";
        }

        var data = {
            company_name: name
        };

        //Params == url, type(POST), request data, modal id to hide, table to reload
        saveData(url, type, data, "#my-modal", table, status);
    });

    //Edit
    $("#table_id tbody").on("click", "button.edit", function() {
        var data = table.row($(this).parents("tr")).data();

        $("#my-modal").modal("show");
        $("#my-modal").attr("row_id", data.id).attr("status", "edit");
        $("#my-modal-title").text("Edit Company");
        $("#company_name").val(data.company_name);
        $("#save").text("Update");
    });

    //Delete 
    $("#table_id tbody").on("click", "button.delete", function() {
        var data = table.row($(this).parents("tr")).data();

        //Params -- url, row id, table to reload
        deleteData("api/company/" + data.id, table);
    });
});
</script>
@endsection