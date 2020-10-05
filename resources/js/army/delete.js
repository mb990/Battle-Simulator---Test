$(document).ready(function () {

    window.deleteArmy = function (armyId, e) {

        e.preventDefault();

        $.ajax({

            url: route('army.delete', armyId),
            type: 'delete',
            success: function (data) {

                console.log(data.success);
            }

        })

    }

})
