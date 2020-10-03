$(document).ready(function () {

    window.startTheGame = function (e) {

        e.preventDefault();

        let currentNumberOfArmies = document.getElementById('js-number-of-game-armies').value;

        // console.log('broj armija trenutno: ' + currentNumberOfArmies);

        if (checkNumberOfGameArmies(currentNumberOfArmies, e)) {

            console.log('startovala bitka');
        }

        else {

            alert('You need to have at least 5 armies to be able to start the game');
        }

    }

})
