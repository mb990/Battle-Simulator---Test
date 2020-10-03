$(document).ready(function () {

    window.storeGame = function(e) {

        let activeLimitBroken = $('.js-active-games-limit').val();

        if (!activeLimitBroken) {

            e.preventDefault();

            $.ajax({

                url: route('game.store'),
                type: 'post',
                success: function (data) {

                    window.location = data.url;

                }

            })
        }

        else {

            alert('You have reached the allowed maximum of active games. Please try again later.')
        }

    }

})
