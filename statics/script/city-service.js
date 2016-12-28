$(function () {
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