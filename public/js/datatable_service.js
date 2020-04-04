function getTable(params) {

    var table = $(params.table_id).DataTable({
        bScrollCollapse: true,
        aoColumnDefs: [{
            sWidth: "16%",
            aTargets: [-1]
        }],
        ajax: {
            url: params.url,
            data: params.data
        },
        columns: getColumns(params.url)

    });

    return table;
}

function getColumns(url) {
    var col = [];
    switch (url) {
        case 'api/item':
            col = [{
                    data: "id"
                },
                {
                    data: "name"
                },
                {
                    data: "quantity"
                }
            ]
            break;

        default:
            break;
    }
    if (col.length > 0) {
        col.push({
            defaultContent: '<button type="button" class="btn btn-primary edit" style="width: 60px;margin-right:10px;">Edit</button><button type="button" class="btn btn-danger delete" style="width: 80px;">Delete</button>'
        });
    }

    return col;
}