$(document).ready(function(){

    $(function () {
        $("#fos_user_registration_form_roles_1").click(function () {
            if ($(this).is(":checked")) {
                $(".OFF").show();
            } else {
                $(".OFF").hide();
            }
        });
    });
});
