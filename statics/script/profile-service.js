$(function () {
    // Hide & Show forms
    var credentialsForm = $('.Credentials-form');
    var identityForm = $('.Identity-form');

    var triggerCredentialFormButton = $('#CredentialsForm');
    var triggerIdentityFormButton = $('#IdentityForm');
    var hideFormButton = $('#HideForm');

    triggerCredentialFormButton.click(function () {
        if (credentialsForm.hasClass('hidden')) {
            credentialsForm.removeClass('hidden');
            displayFormButton('hide');
        } else {
            credentialsForm.addClass('hidden');
            displayFormButton('show');
        }
    });

    triggerIdentityFormButton.click(function () {
        if (identityForm.hasClass('hidden')) {
            identityForm.removeClass('hidden');
            displayFormButton('hide');
        } else {
            identityForm.addClass('hidden');
            displayFormButton('show');
        }
    });

    hideFormButton.click(function () {
        credentialsForm.addClass('hidden');
        identityForm.addClass('hidden');
        displayFormButton('show');
    });


    function displayFormButton(action) {
        if (action == 'hide') {
            $('.FormButton').addClass('hidden');
            hideFormButton.removeClass('hidden');
        } else if (action == 'show') {
            $('.FormButton').removeClass('hidden');
            hideFormButton.addClass('hidden');
        }
    }

    // Change credential form
    function credentialFormIsValid() {
        return $('input[name="new_password"]').val() == $('input[name="new_password_confirm"]').val();
    }

    credentialsForm.submit(function () {
        $('.alert').addClass('hidden');
        event.preventDefault();

        var credentials = {
            email: $('input[name="email"]').val(),
            current_password: $('input[name="current_password"]').val(),
            new_password: $('input[name="new_password"]').val()
        };

        // Verification
        if (credentialFormIsValid()) {
            // Send request
            $.ajax({
                url: '/services/ChangeCredentialsService.php',
                method: 'POST',
                data: credentials,
                complete: function (data) {
                    var response = data.responseJSON;

                    switch (response.status) {
                        case 'success':
                            document.location.href = 'profil.php';
                            break;
                        case 'incorrect_password':
                            $('.incorrect_password').removeClass('hidden');
                            break;
                        case 'error':
                            $('.server_error').removeClass('hidden');
                    }
                }
            })
        } else {
            $('.not_the_same').removeClass('hidden');
        }
    });

    // Change Identity Form
    identityForm.submit(function () {
        $('.alert').addClass('hidden');
        event.preventDefault();

        var identity = {
            last_name: $('input[name="last_name"]').val(),
            first_name: $('input[name="first_name"]').val(),
            city: $('select[name="city"]').select2().val(),
            number: $('input[name="number"]').val()
        };

        $.ajax({
            url: '/services/ChangeIdentityService.php',
            method: 'POST',
            data: identity,
            complete: function (data) {
                var response = data.responseJSON;

                switch (response.status) {
                    case 'success':
                        document.location.href = 'profil.php';
                        break;
                    case 'error':
                        $('.server_error').removeClass('hidden');
                        break;
                }
            }
        })
    });

    // Mise a disposition des villes
    $('select[name="city"]').select2({
        ajax: {
            url: '/services/GetCityService.php',
            dataType: 'json',
            data: function (params) {
                var query = {
                    search: params.term,
                };
                return query;
            },
            processResults: function (data) {
                var resultat = data.map(function (item) {
                    return {
                        id: item.id_city,
                        text: item.name,
                    };
                });
                return {
                    results: resultat
                };
            }
        },

        minimumInputLength: 1,
    });

});