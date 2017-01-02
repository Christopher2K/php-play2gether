$(function () {
    // Buttons
    $('.Action-modify').click(function () {
        $('.ModifyAd').removeClass('hidden');
        $('.Details').addClass('hidden');
    });

    $('.GoBack').click(function () {
        $('.ModifyAd').addClass('hidden');
        $('.Details').removeClass('hidden');
    });

    // Form things
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
    $('#modifyAdForm').submit(function () {
        event.preventDefault();
        $('.alert').addClass('hidden');

        if (formIsValid()) {
            var ad = {
                id_ad: urlParams.id,
                title: $('input[name="title"]').val(),
                date: $('input[name="date"]').datepicker().val(),
                city_fk: $('select[name="city"]').select2().val(),
                content: $('textarea[name="content"]').val(),
            };

            $.ajax({
                url: '/services/ChangeAdService.php',
                method: 'POST',
                data: ad,
                complete: function (data) {
                    var response = data.responseJSON;

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