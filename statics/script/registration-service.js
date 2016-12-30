$(function () {
    // Verification du formulaire
    function formIsValid() {
        return $('input[name="password"]').val() == $('input[name="password_confirm"]').val();
    }

    // Envoie et traitement du formulaire
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
                city_fk: $('select[name="city"]').select2().val(),
                sports: []
            };

            $('.Sport-select select').each(function (index, element) {
                user.sports.push($(element).val());
            });

            console.log(user);


            $.ajax({
                url: '/services/RegistrationService.php',
                method: 'POST',
                data: user,
                complete: function (data) {
                    var response = data.responseJSON;
                    console.log(data);

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

    // Mise à disposition des villes du formulaire
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


    // Gestion des sports du formulaire
    var container = $('.Sport-fields');
    var index = 1;

    function removeSportField() {
        console.log(index);
        if (index > 1) {
            $('.sport' + index).remove();
            index--;
        }
    }

    function addSportField() {
        if (index < 5) {
            var newElement = $('.sport1').clone(true);
            newElement
                .removeClass('sport1')
                .addClass('sport' + (index + 1))
                .find('select')
                .attr('name', 'sport' + (index + 1));
            newElement.appendTo('.Sport-fields');
            index++;
        }
    }

    $.ajax({
        url: '/services/GetSportService.php',
        method: 'POST',
        complete: function (data) {
            var sportData = data.responseJSON;
            var options = [];
            sportData.forEach(function (sport) {
                options.push('<option value="' + sport.id_sport + '">' + sport.name + '</option>')
            });

            options = options.join('');
            $(options).appendTo('.sport1 select');

            $('.addSport').click(addSportField);
            $('.deleteSport').click(removeSportField);
        }
    });

});
