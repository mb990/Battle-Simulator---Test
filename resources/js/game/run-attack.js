$(document).ready(function () {

    window.runAttack = function (data, e) {

        e.preventDefault();

        // $('.js-start-the-game-div').append('<button class="btn btn-info js-attack-next">Next attack</button>');

        if (!data.data.game_over) {

            if (data.data.success) {

                $('.js-battle-log').append('<p class="lead"><strong>' + data.data.attackingArmy.name + '</strong> army attacked <strong>'
                    + data.data.attackedArmy.name + '</strong> and dealt <strong>' + data.data.damage + '</strong> damage, killing <strong>' +
                    + data.data.lost_units + '</strong> units. Army <strong>' + data.data.attackedArmy.name + '</strong> has <strong>' +
                    data.data.attackedArmy.units
                    + '</strong> units remaining. </p>');

                console.log(data);
            }

            else {

                $('.js-battle-log').append('<p class="lead"><strong>' + data.data.attackingArmy.name + ' </strong>unsuccessfully attacked <strong>' + data.data.attackedArmy.name + '</strong>.</p>');
            }

        }

        else {

            alert('Game is over. Army ' + data.data.victorious_army.name + ' is victorious!');
        }

    }

})
