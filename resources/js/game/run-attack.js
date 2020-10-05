$(document).ready(function () {

    window.runAttack = function (data, e) {

        e.preventDefault();

        // $('.js-start-the-game-div').append('<button class="btn btn-info js-attack-next">Next attack</button>');

        let gameOverSelector = $('.js-is-game-over');

        let gameId = $('.js-game-id').val();

        if (!data.data.game_over && gameOverSelector.val() != 1) {

            if (data.data.attackingArmy.units > 0) {

                if (data.data.success) {

                    if (data.data.attackedArmy.units <= 0) {

                        $('.js-battle-log').append('<p class="lead"><strong>' + data.data.attackingArmy.name + '</strong> army attacked <strong>'
                            + data.data.attackedArmy.name + '</strong> and dealt <strong>' + data.data.damage + '</strong> damage, killing <strong>' +
                            + data.data.lost_units + '</strong> units. Army <strong>' + data.data.attackedArmy.name + '</strong> is defeated.</p>');

                        // console.log(data);

                        // deleteArmy(data.data.attackedArmy.id, e);
                    }

                    else {

                        $('.js-battle-log').append('<p class="lead"><strong>' + data.data.attackingArmy.name + '</strong> army attacked <strong>'
                            + data.data.attackedArmy.name + '</strong> and dealt <strong>' + data.data.damage + '</strong> damage, killing <strong>' +
                            + data.data.lost_units + '</strong> units. Army <strong>' + data.data.attackedArmy.name + '</strong> has <strong>' +
                            data.data.attackedArmy.units
                            + '</strong> units remaining. </p>');

                        // console.log(data);
                    }
                }

                else {

                    $('.js-battle-log').append('<p class="lead"><strong>' + data.data.attackingArmy.name + ' </strong>unsuccessfully attacked <strong>' + data.data.attackedArmy.name + '</strong>.</p>');
                }
            }

            return 0;

        }

        else {

            $('.js-is-game-active').val(0);

            gameOverSelector.val(1);

            return 1; // is the game over
        }

    }

})
