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
});