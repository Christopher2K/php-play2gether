/**
 * Created by christopher on 20/12/2016.
 */

$(function () {
    // Verification du formulaire
    function formIsValid() {
        return $('input[name="password"]').val() == $('input[name="password_confirm"]').val();
    }

    $('#registerForm').submit(function (event) {
        $('.alert').addClass('hidden');
        event.preventDefault();

        if (formIsValid()) {
            var user = {
                last_name: $('input[name="last_name"]').val(),
                first_name: $('input[name="first_name"]').val(),
                gender: $('select[name="gender"]').val(),
                birth_date: $('input[name="birth_date"]').val(),
                email: $('input[name="email_adress"]').val(),
                password: $('input[name="password"]').val(),
                city: $('select[name="city"]').select2().val()
            };

            $.ajax({
                url: '/services/RegistrationService.php',
                method: 'POST',
                data: user,
                complete: function (data) {
                    var response = data.responseJSON;

                    switch (response.status) {
                        case 'success':
                            document.location.href = 'profil.php';
                            break;
                        case 'user_already_exists':
                            $('.mail_error').removeClass('hidden');
                            break;
                        case 'error':
                            $('.server_error').removeClass('hidden');
                            break;
                    }
                }
            });
        }
        else {
            $('.password_error').removeClass('hidden');
        }
    });


});
