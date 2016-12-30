$(function () {
    // Mise à disposition des sports
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
            $(options).appendTo('select[name="sport"]');
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

    // Verification du formulaire
    function formIsValid() {
        var date = $('input[name="date"]').datepicker("getDate").getTime();
        var now = Date.now();
        var description = $('textarea').val();

        return date > now;
    }

    // Handle form
    $('#createAdForm').submit(function () {
        event.preventDefault();
        $('.alert').addClass('hidden');

        if (formIsValid()) {
            var ad = {
                title: $('input[name="title"]').val(),
                date: $('input[name="date"]').datepicker().val(),
                sport_fk: $('select[name="sport"]').val(),
                max_players: $('select[name="max_players"]').val(),
                city_fk: $('select[name="city"]').select2().val(),
                content: $('textarea[name="content"]').val(),
            };

            $.ajax({
                url: '/services/CreateAdService.php',
                method: 'POST',
                data: ad,
                complete: function (data) {
                    var response = data.responseJSON;
                    console.log(data);

                    switch (response.status) {
                        case 'success':
                            document.location.href = 'annonceDetail.php/?id=' + response.id_ad;
                            break;
                        case 'error':
                            $('.server_error').removeClass('hidden');
                            break;
                    }
                }
            });
        } else {
            $('.date_error').removeClass('hidden');
        }
    });
});