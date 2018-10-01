$(document).on('change', '#appbundle_vehicledefinition_marque, #appbundle_vehicledefinition_model', function () {
    let $field = $(this)
    let $marqueField = $('#appbundle_vehicledefinition_marque')
    let $form = $field.closest('form')
    let target = '#' + $field.attr('id').replace('model', 'version').replace('marque', 'model')
    // Les données à envoyer en Ajax
    let data = {}
    data[$marqueField.attr('name')] = $marqueField.val()
    data[$field.attr('name')] = $field.val()
    // On soumet les données
    $.post($form.attr('action'), data).then(function (data) {
        // On récupère le nouveau <select>
        let $input = $(data).find(target)
        // On remplace notre <select> actuel
        $(target).replaceWith($input)
    })
})