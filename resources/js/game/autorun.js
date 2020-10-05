$(document).ready(function () {

    window.autorunGame = function (e) {

        e.preventDefault();

        let gameIsOver = $('.js-is-game-over').val();

        while (gameIsOver == 0) {

            startTheGame(e);

            gameIsOver = $('.js-is-game-over').val();
        }

    }

})
