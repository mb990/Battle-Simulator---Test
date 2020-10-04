$(document).ready(function () {

    window.startTheGame = function (e) {

        e.preventDefault();

        let currentNumberOfArmies = document.getElementById('js-number-of-game-armies').value;

        let gameIsActive = $('.js-is-game-active').val();

        if (!gameIsActive) {

            if (checkNumberOfGameArmies(currentNumberOfArmies, e)) {

                console.log('startovala bitka');

                let attackingArmyId = $('.js-next-army-to-attack-id').val();

                $.ajax({

                    url: route('attack.start', attackingArmyId),
                    type: 'get',
                    success: function (data) {

                        runAttack(data, e);

                    }

                })

            }

            else {

                alert('You need to have at least 5 armies to be able to start the game');
            }
        }

        else {

            console.log('startovala bitka');

            let attackingArmyId = $('.js-next-army-to-attack-id').val();

            $.ajax({

                url: route('attack.start', attackingArmyId),
                type: 'get',
                success: function (data) {

                    runAttack(data, e);

                }

            })
        }



    }

})
