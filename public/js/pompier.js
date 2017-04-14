var loca = location.pathname.substring(location.pathname.lastIndexOf("/") + 1);

switch (loca) {
    case "addPompier":
        loadPompier();
        break;
}

$("#addButton").on('click', function(e) { // ajouter un pompier
    e.preventDefault();
    var com = {};
    var nom = $("#ajoutNom").val();
    var prenom = $("#ajoutPrenom").val();
    var matricule = $("#ajoutMatricule").val();
    if (nom != "" && prenom != "" && matricule != "") { // la personne a défini un nom donc on continue
        $("input:checkbox[type=checkbox]:checked").each(function() { // parcours des compétences qui ont été coché..
            var competence = $(this).val().split("cbox")[1].split("b")[0];
            if (!isNaN(competence)) { // on sauvegarde que les compétences "numérique" !
                var compet = 'competence' + competence;
                com[compet] = 1;
            } else {
                console.log("Compétences non numérique: " + competence);
            }
        });
        com["nom"] = nom;
        com["prenom"] = prenom;
        com["matricule"] = matricule;
        sendAjax("POST", "addPompier", JSON.stringify(com), function(response) { // envoit des informations & récupération de la réponse par callback
            Materialize.toast((response.message == "ok" ? "Pompier a bien été ajouté!" : "Problème"), 4000);
        });
    } else {
        Materialize.toast("Veuillez remplir tous les champs.", 4000);
    }
});

$("#supprimer").on('click', function(e) {
    e.preventDefault();
    var data = {};
    var nom = $("#nom").text();
    var prenom = $("#prenom").text();
    if ((nom != "") && (prenom != "")) {
        data = {
            nom: nom,
            prenom: prenom
        }
        sendAjax("POST", "deletePompier", JSON.stringify(data), function(response) {
            Materialize.toast((response.message == "ok" ? "Pompier a bien été supprimé!" : "Impossible de supprimer un pompier qui n'existe pas."), 4000);
        });
    }
});

function sendAjax(method, url, data = null, callback) { // POurquoi data null ? Si on fait un rêquete GET, il y a pas forcément d'args!
    $.ajax({
        url: url,
        method: method,
        data: data
    }).done(function(response) {
        callback(JSON.parse(response));
    });
}

function doCheck(competence) {
    var check = '<td><input type="checkbox" id="cbox' + competence + 'a1" value="checkbox"><label for="cbox' + competence + 'a1" ></label></td>';
    return check;
}

function loadPompier() {
    sendAjax("GET", "getallpompier", "", function(response) {
        console.log(response);
    });
}