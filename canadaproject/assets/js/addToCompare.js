$('.ladivJsdeClement').on('click', function () {
    $('#appbundle_vehicledefinition_save').val($(this).id);
    $('form[name=appbundle_vehicledefinition]').submit;
});