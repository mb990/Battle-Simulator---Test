$(document).ready(function () {

    window.checkNumberOfGameArmies = function(numberOfArmies, e) {

        e.preventDefault();

        return numberOfArmies >= 5;
    }

})
