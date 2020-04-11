//Save data Ajax
function saveData(url, type, data, modal_id = '', table = '', status = '') {
    $.ajax({
            url: url,
            type: type,
            data: data,
            complete: function() {},
            success: function(res) {
                var msg = 'Successfully Saved';
                if (status == 'edit')
                    msg = 'Successfully Updated';

                toastr.options = {
                    positionClass: "toast-bottom-right"
                };
                toastr.success(msg);
            }
        }).done(function(data) {
            if (modal_id == 'pdf') {
                window.open('api/print/' + data.id);
                return false;
            }
            if (modal_id != '' & table != '') {
                $(modal_id).modal('hide');
                table.ajax.reload();
            }
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            var error = jqXHR.responseJSON.errors;
            $.each(error, function(k, v) {
                toastr.error(v[0]);
                // console.log('#' + k + '_error');
                // $('#' + k + '_error').text(v[0]);
            });
        });
}

//Delete Data Ajax
function deleteData(url, table) {
    swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover",
            icon: "warning",
            buttons: true,
            buttons: {
                cancel: 'Cancel',
                confirm: { text: 'Yes Delete It', className: 'sweet-warning' }
            },
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

function log(log) {
    console.log(log);
}