$(document).ready(function () {
    $('#search').keyup(function (e) {
        console.log($(this));
        var msg = $(this).val();
        if(msg.length > 2){
            $.ajax({
                url : '/search/'+msg,
                type: 'GET',
                success: function (response, statut) {
                    $('#search_div').removeClass('has-error');
                    $('#helpBlock').html("");
                    $('#villes').empty();
                    var tableau = JSON.parse(response);
                    if(tableau.length == 0){
                        $('#search_div').removeClass('has-error');
                        $('#helpBlock').html("Aucun resultat.");
                    } else {
                        for(var i = 0; i < tableau.length; i++){
                            $('#villes').append('<option value="'+tableau[i].ville_nom+'">'+tableau[i].ville_nom+'</option>');
                        }
                    }
                    console.log(JSON.parse(response));
                },
                error: function (response, statut, err) {
                    $('#search_div').addClass('has-error');
                    $('#helpBlock').html("Que des lettres.");
                }
            });
        };
    });
});