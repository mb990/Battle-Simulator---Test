$(document).ready(function () {

    window.updateGame = function (e) {

        e.preventDefault();

        let activeStatus = 1;

        let gameId = $('.js-game-id').val();

        $.ajax({

            url: route('game.update', gameId),
            type: 'put',
            data: {
                active: activeStatus
            }
            // ,
            // success: function (data) {
            //
            // }

        })

    }

})
