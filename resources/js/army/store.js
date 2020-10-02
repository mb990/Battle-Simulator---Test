$(document).ready(function () {

    window.storeArmy = function (e) {

        e.preventDefault();

        let gameId = $('.js-game-id').val();
        let name = $('.js-army-name').val();
        let units = $('.js-army-units').val();
        let strategyId = $('.js-army-strategy').val();

        if (document.getElementById('army-name').validity.valid && document.getElementById('army-units').validity.valid) {

            $.ajax({

                url: route('army.store'),
                type: 'post',
                data: {
                    name: name,
                    units: units,
                    game_id: gameId,
                    attack_strategy_id: strategyId
                },
                success: function (data) {

                    $('.js-created-armies-div').append('<p><strong>Army name: </strong>' + data.army.name + '<strong> Units: </strong>' + data.army.units + '<strong> Strategy:</strong> attack ' + data.army.attack_strategy.name + '</p>');

                    if (checkNumberOfGameArmies(data.army.game, e)) {

                        $('.js-start-the-game-div').append('<button class="btn btn-info">Start the battle</button>');
                    }

                    else {

                        console.log('nije appendovan button za start');
                    }

                }

            })




        }

        else {

            alert('Please add all army information before submitting');
        }

    }

})
