/**
 * Created by christopher on 20/12/2016.
 */

$(function () {
    // Ajax request for cities
    $('select[name="city"]').select2({
        ajax: {
            url: '/services/GetVillesService.php',
            dataType: 'json',
            data: function (params) {
                var query = {
                    search: params.term,
                };
                return query;
            },
            processResults: function (data) {
                var resultats = data.map(function (item) {
                    return {
                        id: item.ville_id,
                        text: item.ville_nom_reel
                    };
                });
                return {
                    results: resultats
                };
            }
        },

        minimumInputLength: 1,
    });

    // Verification du formulaire
    function formIsValid() {
        return $('input[name="password"]').val() == $('input[name="password_confirm"]').val();
    }

    $('#registerForm').submit(function (event) {
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
                url: '/services/InscriptionService.php',
                method: 'POST',
                data: user,
                complete: function (data) {
                    console.log(data);
                }
            });
        }
    });


});
