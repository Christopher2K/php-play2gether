$(function () {
    $('#connexionForm').submit(function (event) {
        $('.alert').addClass('hidden');
        event.preventDefault();

        var loginInformations = {
            email: $('input[name="email"]').val(),
            password: $('input[name="password"]').val()
        };

        $.ajax({
            url: '/services/ConnexionService.php',
            method: 'POST',
            data: loginInformations,
            complete: function (data) {
                var response = data.responseJSON;

                switch (response.status) {
                    case 'success':
                        document.location.href = 'profil.php';
                        break;
                    case 'not_found':
                        $('.not_found').removeClass('hidden');
                        break;
                    case 'error':
                        $('.server_error').removeClass('hidden');
                        break;
                }
            }
        });

    });


});
