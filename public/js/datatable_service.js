function getTable(params) {

    var table = $(params.table_id).DataTable({
        bScrollCollapse: true,
        bJQueryUI: true,
        aoColumnDefs: [{
            sWidth: "16%",
            aTargets: [-1]
        }],
        ajax: {
            url: params.url,
            data: params.data
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

    return table;
}