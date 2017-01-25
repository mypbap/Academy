$(document).ready(function(){
    $( ".show" ).click(function() {
        if ($('input[type="file"]').val()) {
            var file_name = $('input[type="file"]')[0].files[0].name;
            $.ajax({
                url: 'obrabotchik.php',
                method: 'POST',
                data: {"path": file_name, "action": "show"}
            }).done(function (data) {
                data = jQuery.parseJSON(data);
                if (data.ok) {
                    if (data.text)
                        $('.show-table').html(data.text);
                }
                else {
                    $('.error').html(data.text);
                }
            });
        } else alert("Файл не вибрано!");
    });
    $( ".show_sort_by_price" ).click(function() {
        if ($('input[type="file"]').val()) {
            var file_name = $('input[type="file"]')[0].files[0].name;
            $.ajax({
                url: 'obrabotchik.php',
                method: 'POST',
                data: {"path": file_name, "action": "show", "sort": "price"}
            }).done(function (data) {
                data = jQuery.parseJSON(data);
                if (data.ok) {
                    if (data.text)
                        $('.show-table').html(data.text);
                }
                else {
                    $('.error').html(data.text);
                }
            });
        } else alert("Файл не вибрано!");
    });
    $( ".reysiv_do_lvova" ).click(function() {
        if ($('input[type="file"]').val()) {
            var file_name = $('input[type="file"]')[0].files[0].name;
            $.ajax({
                url: 'obrabotchik.php',
                method: 'POST',
                data: {"path": file_name, "action": "count"}
            }).done(function (data) {
                data = jQuery.parseJSON(data);
                if (data.ok) {
                    if (data.text)
                        $('.show-table').html(data.text);
                }
                else {
                    $('.error').html(data.text);
                }
            });
        } else alert("Файл не вибрано!");
    });

    $( ".reysu_z_priz" ).click(function() {
        if ($('input[type="file"]').val()) {
            var file_name = $('input[type="file"]')[0].files[0].name;
            $.ajax({
                url: 'obrabotchik.php',
                method: 'POST',
                data: {"path": file_name, "action": "like", "like": $('.info_v_priz').val()}
            }).done(function (data) {
                data = jQuery.parseJSON(data);
                if (data.ok) {
                    if (data.text)
                        $('.show-table').html(data.text);
                }
                else {
                    $('.error').html(data.text);
                }
            });
        } else alert("Файл не вибрано!");
    });
    
    $("#idForm").submit(function(e) {
        e.preventDefault();
        if ($('input[type="file"]').val()) {
            var error = 1;
            if (isNaN($('.price').val())) {
                error = 0;
                $('.error').html('В поле ціна повинно бути вказане числове значення!');
            }
            if ($('.time').val().match(/^([0-9]|0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/i)) {
                error = 0;
                $('.error').html('В поле час вильоту повинно бути вказано годину!');
            }
            if (error) {
                var data = $('#idForm').serializeArray();
                $.ajax({
                    type: "POST",
                    url: "obrabotchik.php",
                    data: {"add": data, "path": $('input[type="file"]')[0].files[0].name, "action": "add"}, // serializes the form's elements.
                    success: function (data) {
                        data = jQuery.parseJSON(data);
                        if (data.ok) {
                            if (data.text) $('.show-table').html(data.text);
                        } else {
                            $('.error').html(data.text);
                        }
                    }
                });
            }
        } else alert("Файл не вибрано!");
    });

    $( ".show_add" ).click(function() {
        var form = $('.form_add_race');
        if (form.hasClass('active')) {
            form.removeClass('active').hide();
        } else form.show().addClass('active');
    });
});
