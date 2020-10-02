$(document).ready(function () {

    window.checkNumberOfGameArmies = function(game, e) {

        e.preventDefault();

        return game.armies >= 5;
    }

})
