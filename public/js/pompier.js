$("#addButton").on('click', function(e) { // ajouter un pompier
    e.preventDefault();
    var com = {};
    var nom = $("#ajoutNom").val();
    var prenom = $("#ajoutPrenom").val();
    if (nom != "" && prenom != "") { // la personne a défini un nom donc on continue
        $("input:checkbox[type=checkbox]:checked").each(function() { // parcours des compétences qui ont été coché..
            var competence = $(this).val().split("cbox")[1].split("b")[0];
            if (!isNaN(competence)) { // on sauvegarde que les compétences "numérique" !
                var compet = 'competence' + competence;
                com[compet] = true;
            } else {
                console.log("Compétences non numérique: " + competence);
            }
        });
        com["nom"] = nom;
        com["prenom"] = prenom;
        sendAjax("POST", "addPompier", JSON.stringify(com), function(response) { // envoit des informations & récupération de la réponse par callback
            console.log(response);
        });
    }
});

function sendAjax(method, url, data = null, callback) { // POurquoi data null ? Si on fait un rêquete GET, il y a pas forcément d'args!
    $.ajax({
        url: url,
        method: method,
        data: data
    }).done(function(response) {
        callback(response);
    });
}