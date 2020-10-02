$(document).ready(function () {

    window.storeGame = function(e) {

        e.preventDefault();

        $.ajax({

            url: route('game.store'),
            type: 'post',
            success: function (data) {

                window.location = data.url;

            }

        })

    }

})
