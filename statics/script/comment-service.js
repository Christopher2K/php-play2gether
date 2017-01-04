$(function () {
    function commentValid() {
        return ($('textarea[name="content"]').val().length > 30);
    }

    // HANDLE FORM
    $('#commentForm').submit(function () {
        event.preventDefault();
        $('.alert').addClass('hidden');

        if (commentValid()) {
            var comment = {
                ad_fk: urlParams.id,
                content: $('textarea[name="content"]').val(),
            };

            $.ajax({
                url: '/services/AddCommentService.php',
                method: 'POST',
                data: comment,
                complete: function (data) {
                    var response = data.responseJSON;
                    console.log(data);

                    switch (response.status) {
                        case 'success':
                            document.location.href = 'annonceDetail.php/?id=' + urlParams.id;
                            break;
                        case 'error':
                            $('.server_error').removeClass('hidden');
                            break;
                    }
                }
            });
        } else {
            $('.too_short').removeClass('hidden');
        }
    });

    // Handle deletion
    $('.Delete-comment').click(function () {
        $.ajax({
            url: '/services/DeleteCommentService.php',
            method: 'POST',
            data: {id_comment: $('.Delete-comment').attr('data-id')},
            complete: function (data) {
                var response = data.responseJSON;
                console.log(data);

                switch (response.status) {
                    case 'success':
                        document.location.href = 'annonceDetail.php/?id=' + urlParams.id;
                        break;
                    case 'error':
                        $('.server_error').removeClass('hidden');
                        break;
                }
            }
        });
    });
});