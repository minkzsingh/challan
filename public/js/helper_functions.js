//Save data Ajax
function saveData(url, type, data, table) {
    $.ajax({
        url: url,
        type: type,
        data: data,
        complete: function() {
            $(modal_id).modal('hide');
            table.ajax.reload();
        },
        success: function(res) {}
    });
}

//Delete Data Ajax
function deleteData(url, table) {
    swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    complete: function() {
                        table.ajax.reload();
                    },
                    success: function(res) {
                        swal("Your record has been deleted!", {
                            icon: "success",
                        });
                    }
                });
            } else {
                swal("Your record is safe!");
            }
        });
}