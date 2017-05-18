var loca = location.pathname.substring(location.pathname.lastIndexOf("/") + 1);

switch (loca) {
    case "addPompier":
        loadPompier();
        break;
}

function deleteUser() {
    var elemId = ($(this).attr("id")).substr(9);
    console.log(($(this).attr("id")).substr(9));
    com = {};
    com["id"] = elemId;
    sendAjax("POST", "deletePompier", JSON.stringify(com), function(response) {
        Materialize.toast((response.message == "ok" ? "Pompier a bien été supprimé!" : "Problème"), 4000);
	if (response.message == "ok") {
	    $("#pompier" + elemId).remove();
	}
    });
}

function deleteUserId() {
    var elemId = ($(this).attr("id")).substr(9);
    com = {};
    com["id"] = elemId;
    sendAjax("POST", "deletePompier", JSON.stringify(com), function(response) {
        Materialize.toast((response.message == "ok" ? "Pompier a bien été supprimé!" : "Problème"), 4000);
        if (response.message == "ok") {
            $("#pompier" + elemId).remove();
        }
    });
}

$(".deleter").each(function(index) {
    $(this).click(deleteUser);
});

$("#addButton").on('click', function(e) { // ajouter un pompier
    e.preventDefault();
    var com = {};
    var nom = $("#ajoutNom").val();
    var prenom = $("#ajoutPrenom").val();
    var matricule = $("#ajoutMatricule").val();
    if (nom != "" && prenom != "" && matricule != "") { // la personne a défini un nom donc on continue
        $(".adder:checked").each(function() { // parcours des compétences qui ont été coché..
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
            if (response.message == "ok") {
                sendAjax("GET", "getallpompier", "", function(response) {
                    console.log(response);
                    console.log(response[response.length - 1]);
                    pompier = response[response.length - 1];
                    $("#pompier").append(
                        "<tr id='pompier" + pompier.id + "'>" +
                        "<td class='tableNoms'>" +
                        "<span id='modifier" +  pompier.id + "prenom'>" + pompier.prenom + " </span>" +
                        "<span id='modifier" + pompier.id + "nom'>" + pompier.nom + "</span></td>" +
                        "<td><input type='checkbox'" + ((pompier.competence1 == 1) ? "checked " : "") +
                        "class='modifier" + pompier.id + "btn-group' disabled id='cbox1a" + pompier.id + "'" +
                        "value='checkbox'><label for='cbox1a{{ entry.id }}'></label></td>" +
                        "<td><input type='checkbox'" + ((pompier.competence2 == 1) ? "checked " : "") +
                        "class='modifier" + pompier.id + "btn-group' disabled id='cbox2a" + pompier.id + "'" +
                        "value='checkbox'><label for='cbox2a" + pompier.id + "'></label></td>" +
                        "<td><input type='checkbox' " + ((pompier.competence3 == 1) ? "checked " : "") +
                        "class='modifier" + pompier.id + "btn-group' disabled id='cbox3a" + pompier.id + "'" +
                        "value='checkbox'><label for='cbox3a" + pompier.id + "'>" +
                        "</label></td><td><input type='checkbox' " + ((pompier.competence4 == 1) ? "checked " : "") +
                        "class='modifier" + pompier.id + "btn-group' disabled id='cbox4a" + pompier.id + "' value='checkbox'>" +
                        "<label for='cbox4a" + pompier.id + "'></label></td><td>" +
                        "<input type='checkbox'" + ((pompier.competence5 == 1) ? "checked " : "") +
                        "class='modifier" + pompier.id + "btn-group' disabled id='cbox5a" + pompier.id + "'" +
                        "value='checkbox'><label for='cbox5a" + pompier.id + "'></label></td>" +
                        "<td><button id='modifier" + pompier.id + "' class='modificator waves-effect waves-light btn'>" +
                        "Modif</button></td><td><button id='supprimer" + pompier.id + "'" +
                        "class='waves-effect red darken-1 btn deleter'>Suppr</button></td></tr>"
                    );
                    updateButton("#modifier" + pompier.id);
                    $("#supprimer" + pompier.id).click(deleteUserId);
                });

            }
        });
    } else {
        Materialize.toast("Veuillez remplir tous les champs pour continuer.", 4000);
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
