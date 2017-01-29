$(document).ready(function(){
    function ajaxSend(url,data) {
        $.ajax({
            url: url,
            method: 'POST',
            data: data
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
    }

    $( ".show" ).click(function() {
        var file_input = $('input[type="file"]');
        if (file_input.val()) {
            ajaxSend('obrabotchik.php',{"path": file_input[0].files[0].name, "action": "show"});
        } else alert("Файл не вибрано!");
    });

    $( ".show_sort_by_price" ).click(function() {
        var file_input = $('input[type="file"]');
        if (file_input.val()) {
            ajaxSend('obrabotchik.php',{"path": file_input[0].files[0].name, "action": "show", "sort": "price"});
        } else alert("Файл не вибрано!");
    });

    $( ".reysiv_do_lvova" ).click(function() {
        var file_input = $('input[type="file"]');
        if (file_input.val()) {
            ajaxSend('obrabotchik.php',{"path": file_input[0].files[0].name, "action": "count"});
        } else alert("Файл не вибрано!");
    });

    $( ".reysu_z_priz" ).click(function() {
        var file_input = $('input[type="file"]');
        if (file_input.val()) {
            ajaxSend('obrabotchik.php',{"path": file_input[0].files[0].name, "action": "like", "like": $('.info_v_priz').val()});
        } else alert("Файл не вибрано!");
    });

    $( ".zadacha" ).prop( "disabled", true );

    $('input[type="file"]').change(function(e){
        $( ".zadacha" ).prop("disabled",$(this).val() ? false : true);
        $('.show-table, .error').empty();
    });

    $("#idForm").submit(function(e) {
        e.preventDefault();
        var file_input = $('input[type="file"]');
        if (file_input.val()) {
            var error = 1;
            if (isNaN($('.price').val())) {
                error = 0;
                $('.error').html('В поле ціна повинно бути вказане числове значення!');
            }
            if (!$('.time').val().match(/^([0-9]|0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/i)) {
                error = 0;
                $('.error').html('В поле час вильоту повинно бути вказано годину!');
            }
            if (error) {
                var data = $('#idForm').serializeArray();
                ajaxSend('obrabotchik.php',{"add": data, "path": file_input[0].files[0].name, "action": "add"});
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