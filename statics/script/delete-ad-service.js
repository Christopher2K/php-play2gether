$(function () {
    $.ajax({
        method: 'POST',
        data : {id_ad: urlParams.id},
        url: '/services/DeleteAdService',
        complete: function (data) {
            var response = data.responseJSON;

            switch (response.status) {
                case 'success':
                    document.location.href = 'profil.php';
                    break;
                default:
                    $('.server_error').removeClass('hidden');
                    break;
            }
        }
    })
});
