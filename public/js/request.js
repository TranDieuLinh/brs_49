/**
 * Created by VS9 X64Bit on 02/03/2017.
 */
// Delete request
$(document).on('click', '.delete_request', function () {
    if (!confirm("Bạn có chắc chắn muốn xóa?")) return;
    var requestIdDelete = $(this).data("requestid");
    var self = $(this);
    console.log(requestIdDelete);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
        }
    });
    var data = {
        request_id: requestIdDelete
    };
    $.ajax({
        url: './deleteRequest',
        method: 'POST',
        data: data,
        success: function (response) {
            console.log(response);
            //Delete view
            $(self).closest('.row-item').remove(); //Find parent view
        },
        error: function () {
        }
    });
});