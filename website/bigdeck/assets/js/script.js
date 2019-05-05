$(document).ready(function () {
    $('.input select').select2({
        placeholder: {
            id: '',
            text: ''
        }
    });

    $('.input input, .input textarea').focus(function () {
        $(this).parents('.input').addClass('success');
    }).focus();

    $('.input input, .input textarea').blur(function () {
        if ($(this).val() == '') {
            $(this).parents('.input').removeClass('success');
        }
    }).blur();

    $('.select2 *').focus(function() {
        $(this).parents('.input').addClass('success');
        $(this).parent().trigger('select2:open');
    });

    $('.select2').focusout(function() {
        if ($(this).parent().find('select').val() == '') {
            $(this).parents('.input').removeClass('success');
            $(this).trigger('select2:close');
        }
    });

    $('.select2').click(function () {
        $(this).parents('.input').addClass('success');
    });

    $('.input select').each(function() {
        if ($(this).val() != '') {
            $(this).next().click();
        }
    });

    $('select').on('select2:close', function () {
        if ($(this).val() == '') {
            $(this).parents('.input').removeClass('success');
        }
    });

    $('input[type="file"]').change(function() {
        $(this).prev().find('.file-name').addClass('success').text($(this).val().split('\\').pop());
    });
});