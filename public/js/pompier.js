$("#addButton").on('click', function() {
    var com = {};
    var nom = $("#ajoutNom").val();
    if (nom != undefined) { // la personne a défini un nom donc on continue
        $("input:checkbox[type=checkbox]:checked").each(function() {
            var explode = $(this).val().split("cbox")[1].split("b")[0];
            var compet = 'competence' + explode;
            com[compet] = true;
        });
        com["nom"] = nom;
        // Plus tard quand les routes POST seront faites. ;)
        //sendAjax("POST", "addPompier", JSON.stringify(com));
    }
})

function sendAjax(method, url, data) {
    $.ajax({
        url: url,
        method: method,
        data: data
    }).done(function(response) {
        console.log(response);
    });
}