/**
 * Auteur: christopher
 * Date: 23/11/2016
 */

$(function () {
    // Mise à disposition des villes du formulaire
    $('select[name="city_fk"]').select2({
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

    // Sport
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
            $(options).appendTo('select[name="sport_fk"]');
        }
    });
});