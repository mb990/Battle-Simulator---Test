$(document).ready(function () {

    window.startTheGame = function (e) {

        e.preventDefault();

        let currentNumberOfArmies = document.getElementById('js-number-of-game-armies').value;

        if (checkNumberOfGameArmies(currentNumberOfArmies, e)) {

            console.log('startovala bitka');

            // let gameId = $('.js-game-id').val();
            let attackingArmyId = $('.js-next-army-to-attack-id').val();

            $.ajax({

                url: route('attack.start', attackingArmyId), // ili start attack??
                type: 'get',
                success: function (data) {

                    console.log(data);

                    // let unitsLost = data.unitsLost;
                    // let attackedArmyId = data.attackedArmyI;
                    //
                    // $.ajax({
                    //
                    //     url: route('army.update-units', attackedArmyId),
                    //     type: 'put',
                    //     data: {
                    //         unitsLost: unitsLost,
                    //         attackedArmyId: attackedArmyId
                    //     },
                    //     success: function (data) {
                    //
                    //         console.log(data);
                    //     }
                    //
                    // })
                }

            })

        }

        else {

            alert('You need to have at least 5 armies to be able to start the game');
        }

    }

})
