$(document).ready(function () {

    $(document).on("click", ".editImage", function () {
        //console.log(data);
        $('#imageId').val($(this).context.id);
        var url = document.location.origin + '/dashboard/image/show/' + $(this).context.id;
        console.log(url);
        $.get(url, function (data, status) {
            if (data.alt_title != null) {
                $('#alt').val(data.alt_title);
            } else {
                $('#alt').val("");
            }
        });
    });

    $('.imageUploadFormCreate').on('submit', (function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append("_token", $('#token').val());
        $.ajax({
            type: 'POST',
            url: document.location.origin + '/dashboard/image/store',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data === 'Please use .jpeg, .jpg and .png files.') {
                    $.notify({
                        message: data
                    }, {
                        type: 'warning',
                        placement: {
                            from: "top",
                            align: "center"
                        },
                        z_index: 9999,
                    });
                    $("#input_image").val(null);
                }
                if (data === 'Please select image.') {
                    $.notify({
                        message: data
                    }, {
                        type: 'warning',
                        placement: {
                            from: "top",
                            align: "center"
                        },
                        z_index: 9999,
                    });
                } else {
                    $.each(data, function (key, value) {
                        var item = $(".first").clone();
                        item.find("img").attr('src', '/storage/image/' + value.name);
                        item.find(".editImage.modal_button").attr('id', value.id);
                        item.find(".button_input").attr('value', value.id);
                        item.find(".checkbox_modal").attr('value', value.id);
                        item.removeClass('first');
                        item.find(".checkbox_modal").removeAttr('checked');
                        item.appendTo('.row.inner-scroll');
                    });
                    $("#input_image").val(null);
                    $.notify({
                        message: 'Image uploaded successfully.'
                    }, {
                        type: 'success',
                        placement: {
                            from: "top",
                            align: "center"
                        },
                        z_index: 9999,
                    });
                }
            },
            error: function (data) {
                console.log(data);
            }
        });
    }));

    $('select.changeStatus').change(function () {
        if (confirm("Do you want to change order status?")) {
            $.ajax({
                type: 'POST',
                url: document.location.origin + '/dashboard/order/update',
                data: {
                    id: $("option:selected", this)[0].value,
                    order: $("option:selected", this)[0].className,
                    _token: $('#token').val()
                },
                success: function (data) {
                    console.log(data);
                    $.notify({
                        message: 'Order status changed successfully'
                    }, {
                        type: 'success',
                        placement: {
                            from: "top",
                            align: "center"
                        },
                        z_index: 9999,
                    });
                },
                error: function (data) {
                    console.log("error");
                }
            });
        }
    });
});




