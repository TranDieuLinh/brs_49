$(function () {
    $('#sign-up1').on("click", function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
            }
        });
        var result = {
            '_token': $('meta[name = "_token"]').attr('content')
        };
        var user_signup = $("#signup").serializeArray();
        var data = $.merge(user_signup, result);
        $.ajax({
            'url': 'register',
            'type': 'POST',
            data: data,
            success: function (data) {
                swal({
                    title: "Thành công",
                    type: "success",
                    confirmButtonText: "OK",
                    closeOnConfirm: false
                }, function (isConfirm) {
                    if (isConfirm) {
                        location.reload(true);
                    }
                })
            },
            error: function (data) {
                if (data.status === 401) //redirect if not authenticated user.
                    $(location).prop('pathname', 'auth/login');
                if (data.status === 422) {
                    swal({
                        title: "Thất bại",
                        type: "error",
                        confirmButtonText: "OK",
                        closeOnConfirm: false
                    }, function (isConfirm) {
                        if (isConfirm) {
                            location.reload(true);
                        }
                    })
                    //process validation errors here.
                    $errors = jqXhr.responseJSON; //this will get the errors response data.
                    //show them somewhere in the markup
                    errorsHtml = '<div class="alert alert-danger"><ul>';

                    $.each(data, function (key, value) {
                        errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
                    });
                    errorsHtml += '</ul></di>';
                    $('#form-errors').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form
                } else {
                    /// do some thing else
                }
            }
        });
    });

    $('#submit_login').on("click", function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
            }
        });
        var result = {
            '_token': $('meta[name = "_token"]').attr('content')
        };
        var user_login = $("#login1").serializeArray();
        console.log(user_login);
        var data = $.merge(user_login, result);
        console.log(data);
        $.ajax({
            'url': 'submit_login',
            'type': 'POST',
            data: data,
            success: function (data) {
                swal({
                    title: "Thành công",
                    type: "success",
                    confirmButtonText: "OK",
                    closeOnConfirm: false
                }, function (isConfirm) {
                    if (isConfirm) {
                        location.reload(true);
                    }
                });
            }
        });
    })
});
