function sendData(id) {
    var datas = {};
    console.log(id);
    $("." + id + "btn-group").each(function(index) {
	    console.log($(this));
	    datas["competence" + (index + 1)] = $(this).prop('checked');
    });
    datas["nom"] = $("#" + id + "nom").html();
    datas["prenom"] = $("#" + id + "prenom").html();
    console.log(datas);
    var com = datas;
    sendAjax("POST", "modPompier", JSON.stringify(com), function(response) { // envoit des informations & récupération de la réponse par callback
        Materialize.toast((response.message == "ok" ? "Pompier a bien été modifié!" : "Problème :: " + response), 4000);
    });
}

function modifButton() {
    $(this).css("background", "#273E5E");
    $(this).html("Modif");
    $("." + this.id + "btn-group").each(function(index) {
	$(this).attr("disabled", true);
    });
    sendData(this.id);
    $(this).click(enregistrerButton);
    console.log(this);
}

function enregistrerButton() {
    $(this).css("background", "#00B400");
    $(this).html("Enregistrer");
    $("." + this.id + "btn-group").each(function(index) {
	$(this).removeAttr("disabled");
    });
    $(this).click(modifButton);
    console.log(this);
}

$(".modificator").each(function(index) {
    $(this).click(enregistrerButton);
});
