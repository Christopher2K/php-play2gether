$(function () {
    $('.Action-subscribe').click(function () {
        $.ajax({
            method: 'POST',
            url: '/services/SubscriptionAdService.php',
            data: {action: 'subscribe', id_ad: urlParams.id},
            complete: function (data) {
                var response = data.responseJSON;
                console.log(data);

                switch (response.status) {
                    case 'success':
                        document.location.href = 'annonceDetail.php/?id=' + response.id_ad;
                        break;
                    case 'error':
                        console.log(data);
                        break;
                }
            }
        });
    });

    $('.Action-unsubscribe').click(function () {
        $.ajax({
            method: 'POST',
            url: '/services/SubscriptionAdService.php',
            data: {action: 'unsubscribe', id_ad: urlParams.id},
            complete: function (data) {
                var response = data.responseJSON;
                console.log(data);

                switch (response.status) {
                    case 'success':
                        document.location.href = 'annonceDetail.php/?id=' + response.id_ad;
                        break;
                    case 'error':
                        console.log(data);
                        break;
                }
            }
        });
    });
});