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


    $('.altForm').on('submit', (function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: document.location.origin + '/dashboard/image/alt_update',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data === 'Alt is too long. Maximum length is 255 characters.') {
                    $.notify({
                        message: data
                    }, {
                        type: 'success',
                        placement: {
                            from: "top",
                            align: "center"
                        },
                        z_index: 9999,
                    });
                } else {
                    console.log("success");
                    $.notify({
                        message: 'Alt updated successfully.'
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
                console.log("error");
            }
        });
    }));

});

$(document).ready(function (e) {
    $('#special_offer').on('click', (function (e) {
        let offer = $('#show_special_offer');
        if (offer.is(":visible") === false) {
            offer.show();
        } else {
            offer.hide();
        }
    }));


});

$('select.changeStatus').change(function () {
    if (confirm("Do you want to change order status?")) {
        $.ajax({
            type: 'POST',
            url: document.location.origin + '/dashboard/order/headers/update',
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

var options = {
    valueNames: ['name', 'alt']
};

var featureList = new List('modal-list', options);

var options_list = {
    valueNames: ['name', 'description']
};

var featureLists = new List('modal-document', options_list);


$(document).on("click", ".editDocument", function () {
    //console.log(data);
    $('#documentId').val($(this).context.id);
    var url = document.location.origin + '/dashboard/document/show/' + $(this).context.id;
    //console.log(url);
    $.get(url, function (data, status) {
        if (data.description != null) {
            $('#description_d').val(data.description);
        } else {
            $('#description_d').val("");
        }
    });
});

$('.documentUploadFormCreate').on('submit', (function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append("_token", $('#token').val());
    $.ajax({
        type: 'POST',
        url: document.location.origin + '/dashboard/document/create',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data === 'Please upload valid .docx, .pdf, .html and .pptx files.') {
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
                $("#input_document").val(null);
            }
            if (data === 'Please select document.') {
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
                if (data !== 'Please upload valid .docx, .pdf, .html and .pptx files.') {
                    $.each(data, function (key, value) {
                        var item = $(".first_document").clone();
                        item.find("img").attr('src', '/storage/image/' + value.type + '.png');
                        item.find(".editImage.modal_button").attr('id', value.id);
                        item.find(".button_input").attr('value', value.id);
                        item.find(".checkbox_modal").attr('value', value.id);
                        item.find(".editDocument.modal_button").attr('id', value.id);
                        item.find(".name").text(value.real_name);
                        item.removeClass('first_document');
                        item.find(".checkbox_modal").removeAttr('checked');
                        item.appendTo('.row.inner-scroll-doc');
                    });
                    $("#input_document").val(null);
                    $.notify({
                        message: 'Document uploaded successfully.'
                    }, {
                        type: 'success',
                        placement: {
                            from: "top",
                            align: "center"
                        },
                        z_index: 9999,
                    });
                }
            }
        },
        error: function (data) {
            console.log(data);
        }
    });
}));


$('.documentForm').on('submit', (function (e) {
    e.preventDefault();
    //console.log(this.documentId.value);
    divId = this.documentId.value;
    var formData = new FormData(this);
    $.ajax({
        type: 'POST',
        url: document.location.origin + '/dashboard/document/description_update',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            // var des_div = $('#description-' + divId).html('234');
            // console.log(des_div);
            console.log("success");
            $.notify({
                message: 'Description updated successfully.'
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
            console.log(data);
        }
    });
}));
