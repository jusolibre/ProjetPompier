$("#addButton").on('click', function(e) { // ajouter un pompier
    e.preventDefault();
    var com = {};
    var nom = $("#ajoutNom").val();
    if (nom != undefined) { // la personne a défini un nom donc on continue
        $("input:checkbox[type=checkbox]:checked").each(function() {
            var explode = $(this).val().split("cbox")[1].split("b")[0];
            var compet = 'competence' + explode;
            com[compet] = true;
        });
        com["nom"] = nom;
        sendAjax("POST", "addPompier", JSON.stringify(com), function(response) {
            console.log(response);
        });
    }
});

function sendAjax(method, url, data, callback) {
    $.ajax({
        url: url,
        method: method,
        data: data
    }).done(function(response) {
        callback(response);
    });
}