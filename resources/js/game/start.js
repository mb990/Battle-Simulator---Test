$(document).ready(function () {

    window.startTheGame = function (e) {

        e.preventDefault();

        let gameId = $('.js-game-id').val();

        let currentNumberOfArmies = document.getElementById('js-number-of-game-armies').value;

        let gameIsActive = $('.js-is-game-active').val();

        $('.js-battle-log').empty();

        if (gameIsActive == 0) { // game starting for the first time

            if (checkNumberOfGameArmies(currentNumberOfArmies, e)) {

                let armies = $('.js-all-game-armies').val();

                location.reload();

                jQuery.each(JSON.parse(armies), function (key, army) {

                    if (army.units > 0) {

                        updateGame(e);

                        $('.js-is-game-active').val(1);

                        console.log('battle started');

                        // setTimeout(function () {

                            $.ajax({

                                url: route('attack.start', army.id),
                                type: 'get',
                                success: function (data) {

                                    runAttack(data, e);

                                },
                                async: false

                            });
                        // }, 1);

                    }

                });

            }

            else {

                alert('You need to have at least 5 armies to be able to start the game');
            }
        }

        else { // game continues

            console.log('battle continued');

            let armies = $('.js-all-game-armies').val();

            let gameOver = $('.js-is-game-over').val();

            jQuery.each(JSON.parse(armies), function (key, army) {

                if (JSON.parse(armies).length < 2) {

                    // console.log('sad je usao u manje od 2 armije');

                    $('.js-is-game-over').val(1);

                    location.reload();

                    alert('Battle is over, ' + army.name + ' wins.');

                    $.ajax({

                        url: route('game.update', gameId),
                        type: 'put',
                        data: {
                            active: 0
                        },
                        success: function (data) {

                            // console.log(data.success);
                        }

                    })

                    return 1;
                }

                if (army.units > 0 && gameOver != 1) {

                    // setTimeout(function () {

                        $.ajax({

                            url: route('attack.start', army.id),
                            type: 'get',
                            success: function (data) {

                                let isOver = runAttack(data, e);

                                if (typeof data.data.armies !== 'undefined') {

                                    $('.js-all-game-armies').val(JSON.stringify(data.data.armies));
                                }

                                return isOver;

                            },
                            async: false

                        });
                    // }, 1);



                }

                return 0;

            });

        }

    }

})
