$(document).ready(function() {
    $('#menuCategorie li a').click(function() {
        var valueCategorie = $(this).text();
        // sendForm(valueCategorie);
        // window.location.href = "index.php?categorie=" + valueCategorie;
        $('#dropCategorie').html(valueCategorie + ' <span class="caret"></span>');

    });


    $('#menuCategorieAdmin li a').click(function() {
        var valueCategorieAdmin = $(this).text();
        sendForm(valueCategorieAdmin);
        // window.location.href = "indexAdmin.php?categorie=" + valueCategorieAdmin;
        $('#dropCategorieAdmin').html(valueCategorieAdmin + ' <span class="caret"></span>');

    });

    $('#menuGestion li a').click(function() {
        var valueGestion = $(this).text();
        // alert(valueGestion);
        $('#dropGestion').html(valueGestion + ' <span class="caret"></span>');
    });

    var websocket = new WebSocket("ws://localhost:1239/demo/php-socket.php");
    websocket.onopen = function(event) {
        showMessage("<div class='chat-connection-ack'>Connection is established!</div>");
    }
    websocket.onmessage = function(event) {
        var Data = JSON.parse(event.data);
        showMessage("<div class='" + Data.message_type + "'>" + Data.message + "</div>");
        $('#chat-message').val('');
    };

    websocket.onerror = function(event) {
        showMessage("<div class='error'>Problem due to some Error</div>");
    };
    websocket.onclose = function(event) {
        showMessage("<div class='chat-connection-ack'>Connection Closed</div>");
    };

    $('#frmChat').on("submit", function(event) {
        event.preventDefault();
        $('#chat-user').attr("type", "hidden");
        var messageJSON = {
            chat_user: $('#chat-user').val(),
            chat_message: $('#chat-message').val()
        };
        websocket.send(JSON.stringify(messageJSON));
    });


});

function sendForm(categorie) {
    $("#inputCategorie").val(categorie);
    $('#formAction').submit();
}

/*function verifierSess() {
    var monCompte = document.getElementById("monCompte");
    var gestion = document.getElementById("gestion");
    var deconnex = document.getElementById("deconnex");
    var connex = document.getElementById("connex");
    var enreg = document.getElementById("enreg");
    var divSess = document.getElementById("verifSess");
    var myDataSess = divSess.textContent;
    var divAdm = document.getElementById("verifAdmin");
    var myDataAdm = divAdm.textContent;

    if (myDataSess == '') {
        //monCompte.style.display = 'none';
        //gestion.style.display = 'none';
        deconnex.style.display = 'none';
        connex.style.display = 'block';
        enreg.style.display = 'block';
    } else {
        if (myDataAdm == 'admin') {
            // monCompte.style.display = 'none';
            // gestion.style.display = 'block';
            deconnex.style.display = 'block';
            // connex.style.display = 'none';
            // enreg.style.display = 'none';
        } else {
            //monCompte.style.display = 'block';
            // gestion.style.display = 'none';
            deconnex.style.display = 'block';
            connex.style.display = 'none';
            enreg.style.display = 'none';
        }
    }
}*/

function cssAlert() {
    var divAlert = document.getElementsByClassName("alert-success");
    if (divAlert) {
        for (var i = 0; i < divAlert.length; i++) {
            var divAlertText = divAlert[i].textContent;
            alert(divAlertText);
            if (divAlertText.length === 0) {
                divAlert[i].style.display = 'none';
            } else {
                divAlert[i].style.display = 'inline-block';
            }
        }
    }
}

function showMessage(messageHTML) {
    $('#chat-box').append(messageHTML);
}

/*$(document).ready(function(){
	var websocket = new WebSocket("ws://localhost:1239/demo/php-socket.php"); 
	websocket.onopen = function(event) { 
		showMessage("<div class='chat-connection-ack'>Connection is established!</div>");		
	}
	websocket.onmessage = function(event) {
		var Data = JSON.parse(event.data);
		showMessage("<div class='"+Data.message_type+"'>"+Data.message+"</div>");
		$('#chat-message').val('');
	};
	
	websocket.onerror = function(event){
		showMessage("<div class='error'>Problem due to some Error</div>");
	};
	websocket.onclose = function(event){
		showMessage("<div class='chat-connection-ack'>Connection Closed</div>");
	}; 
	
	$('#frmChat').on("submit",function(event){
		event.preventDefault();
		$('#chat-user').attr("type","hidden");		
		var messageJSON = {
			chat_user: $('#chat-user').val(),
			chat_message: $('#chat-message').val()
		};
		websocket.send(JSON.stringify(messageJSON));
	});
});*/

function remplirPanier(quantiteTotale, prixTotal) {
    document.getElementById("spnQuant").innerHTML = quantiteTotale;
    if (prixTotal != '') {
        document.getElementById("spnPrix").innerHTML = '(<sup>$</sup>' + prixTotal + ')';
    } else {
        document.getElementById("spnPrix").innerHTML = prixTotal;
    }

}

function validerFormEnregistrer() {
    var ck_alpha_num = new RegExp(/^[A-Za-zéèîêàâùÂÉÈÊÀÏÎÙ0-9 ]{3,20}$/);
    var ck_courriel = new RegExp(/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i);
    var ck_passe = new RegExp(/^[A-Za-zÀ-ÿ0-9!@#$%^&*()_]{5,20}$/);
    var ck_tel = new RegExp(/^[0-9]{10,12}$/);
    var ck_alphabet = new RegExp(/^[a-zA-ZéèîêàâùÂÉÈÊÀÏÎÙ]+$/);
    var ck_code_postal = new RegExp(/^[ABCEGHJKLMNPRSTVXY]\d[ABCEGHJKLMNPRSTVWXYZ]( )?\d[ABCEGHJKLMNPRSTVWXYZ]\d$/i);
    var ck_app = new RegExp(/^[0-9]*[a-zA-Z]*$/);
    var ck_string = new RegExp(/^[a-zA-ZéèîêàâùÂÉÈÊÀÏÎÙ0-9]+$/);
    var ck_no_civ = new RegExp(/^[0-9]+[a-zA-Z]*$/);
    var errors = [];

    var courriel = $('#courriel').val();
    var nom = $('#nom').val();
    var motPasse = $('#motPasse').val();
    var prenom = $('#prenom').val();
    var confMotPasse = $('#confMotPasse').val();
    var telephone = $('#telephone').val();
    var appartement = $('#appartement').val();
    var noCivique = $('#noCivique').val();
    var rue = $('#rue').val();
    var ville = $('#ville').val();
    var province = $('#province').val();
    var codePostal = $('#codePostal').val();
    var pays = $('#pays').val();

    if (!ck_courriel.test(courriel)) {
        errors[errors.length] = "Entrez une adresse courriel valide";
    }

    if (!ck_alpha_num.test(nom)) {
        errors[errors.length] = "Entrez un nom valide, entre 3 et 20 caractères";
    }

    if (!ck_passe.test(motPasse)) {
        errors[errors.length] = "Entrez un mot de passe valide, entre 5 et 20 caractères";
    }

    if (!ck_alpha_num.test(prenom)) {
        errors[errors.length] = "Entrez un prénom valide, entre 3 et 20 caractères";
    }

    if (confMotPasse !== motPasse) {
        errors[errors.length] = "Le mot de passe à confirmer doit être le même";
    }

    if (!ck_tel.test(telephone)) {
        errors[errors.length] = "Entrez un numéro de téléphone valide";
    }

    if (!ck_app.test(appartement)) {
        errors[errors.length] = "Entrez un numéro d'appartement valide";
    }

    if (!ck_no_civ.test(noCivique)) {
        errors[errors.length] = "Entrez un numéro civique valide";
    }

    if (!ck_string.test(rue)) {
        errors[errors.length] = "Entrez une rue valide";
    }

    if (!ck_alphabet.test(ville)) {
        errors[errors.length] = "Entrez une ville valide";
    }

    if (!ck_alphabet.test(province)) {
        errors[errors.length] = "Entrez une province valide";
    }

    if (!ck_code_postal.test(codePostal)) {
        errors[errors.length] = "Entrez un code postal valide";
    }

    if (!ck_alphabet.test(pays)) {
        errors[errors.length] = "Entrez un pays valide";
    }

    if (errors.length > 0) {
        reportErrors(errors, 'msg');
        return false;
    } else {
        return true;
    }

}

function reportErrors(errors, element) {
    var msg = "S'il vous plaît, entrez des données valides: <br/>";
    for (var i = 0; i < errors.length; i++) {
        var numError = i + 1;
        msg += numError + ". " + errors[i] + "<br/>";
    }
    $('#' + element + '').html('<div id="msgConn">' + msg + '</div>');
}

function validerFormConnexion() {
    var ck_courriel = new RegExp(/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i);
    var ck_passe = new RegExp(/^[A-Za-zÀ-ÿ0-9!@#$%^&*()_]{5,20}$/);
    var errors = [];

    var courriel = $('#courriel').val();
    var motPasse = $('#motPasse').val();

    if (!ck_courriel.test(courriel)) {
        errors[errors.length] = "Entrez une adresse courriel valide";
    }
    if (!ck_passe.test(motPasse)) {
        errors[errors.length] = "Entrez un mot de passe valide, entre 5 et 20 caractères";
    }

    if (errors.length > 0) {
        reportErrors(errors, 'msg');
        return false;
    } else {
        return true;
    }
}

function validerFormModifier() {
    var ck_alpha_num = new RegExp(/^[A-Za-zéèîêàâùÂÉÈÊÀÏÎÙ0-9 ]{3,20}$/);
    var ck_courriel = new RegExp(/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i);
    var ck_passe = new RegExp(/^[A-Za-zÀ-ÿ0-9!@#$%^&*()_]{5,20}$/);
    var ck_tel = new RegExp(/^[0-9]{10,12}$/);
    var ck_alphabet = new RegExp(/^[a-zA-ZéèîêàâùÂÉÈÊÀÏÎÙ]+$/);
    var ck_code_postal = new RegExp(/^[ABCEGHJKLMNPRSTVXY]\d[ABCEGHJKLMNPRSTVWXYZ]( )?\d[ABCEGHJKLMNPRSTVWXYZ]\d$/i);
    var ck_app = new RegExp(/^[0-9]*[a-zA-Z]*$/);
    var ck_string = new RegExp(/^[a-zA-ZéèîêàâùÂÉÈÊÀÏÎÙ0-9]+$/);
    var ck_no_civ = new RegExp(/^[0-9]+[a-zA-Z]*$/);
    var errors = [];

    var courriel = $('#courriel').val();
    var nom = $('#nom').val();
    var motPasse = $('#motPasse').val();
    var prenom = $('#prenom').val();
    var telephone = $('#telephone').val();
    var appartement = $('#appartement').val();
    var noCivique = $('#noCivique').val();
    var rue = $('#rue').val();
    var ville = $('#ville').val();
    var province = $('#province').val();
    var codePostal = $('#codePostal').val();
    var pays = $('#pays').val();

    if (!ck_courriel.test(courriel)) {
        errors[errors.length] = "Entrez une adresse courriel valide";
    }

    if (!ck_alpha_num.test(nom)) {
        errors[errors.length] = "Entrez un nom valide, entre 3 et 20 caractères";
    }

    if (!ck_passe.test(motPasse)) {
        errors[errors.length] = "Entrez un mot de passe valide, entre 5 et 20 caractères";
    }

    if (!ck_alpha_num.test(prenom)) {
        errors[errors.length] = "Entrez un prénom valide, entre 3 et 20 caractères";
    }

    if (!ck_tel.test(telephone)) {
        errors[errors.length] = "Entrez un numéro de téléphone valide";
    }

    if (!ck_app.test(appartement)) {
        errors[errors.length] = "Entrez un numéro d'appartement valide";
    }

    if (!ck_no_civ.test(noCivique)) {
        errors[errors.length] = "Entrez un numéro civique valide";
    }

    if (!ck_string.test(rue)) {
        errors[errors.length] = "Entrez une rue valide";
    }

    if (!ck_alphabet.test(ville)) {
        errors[errors.length] = "Entrez une ville valide";
    }

    if (!ck_alphabet.test(province)) {
        errors[errors.length] = "Entrez une province valide";
    }

    if (!ck_code_postal.test(codePostal)) {
        errors[errors.length] = "Entrez un code postal valide";
    }

    if (!ck_alphabet.test(pays)) {
        errors[errors.length] = "Entrez un pays valide";
    }

    if (errors.length > 0) {
        reportErrors(errors, 'msg');
        return false;
    } else {
        return true;
    }
}

function validerFormCommentaires() {
    var ck_alpha_num = new RegExp(/^[A-Za-zéèîêàâùÂÉÈÊÀÏÎÙ0-9 ]{3,20}$/);
    var ck_courriel = new RegExp(/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i);
    var errors = [];
    var nom = $('#nom').val();
    var courriel = $('#courriel').val();
    var description = $('#description').val();

    if (!ck_alpha_num.test(nom)) {
        errors[errors.length] = "Entrez un nom valide, entre 3 et 20 caractères";
    }

    if (!ck_courriel.test(courriel)) {
        errors[errors.length] = "Entrez une adresse courriel valide";
    }

    if (description.length < 10) {
        errors[errors.length] = "Entrez un commentaire valide, entre 10 et 200 caractères";
    }

    if (errors.length > 0) {
        reportErrors(errors, 'msg');
        return false;
    } else {
        return true;
    }
}

function validerFormEnregistrerThe() {
    var ck_alpha_num = new RegExp(/^[A-Za-zéèîêàâùÂÉÈÊÀÏÎÙ0-9 ]{3,20}$/);
    var ck_prix = new RegExp(/^[0-9]+(?:\.[0-9]+)?$/);
    var errors = [];
    var nom = $('#nom').val();
    var description = $('#description').val();
    var prix = $('#prix').val();

    if (!ck_alpha_num.test(nom)) {
        errors[errors.length] = "Entrez un nom de thé valide, entre 3 et 20 caractères";
    }

    if (description.length < 3) {
        errors[errors.length] = "Entrez une description de thé valide, entre 3 et 1000 caractères";
    }

    if (!ck_prix.test(prix)) {
        errors[errors.length] = "Entrez un prix de thé valide";
    }

    if (errors.length > 0) {
        reportErrors(errors, 'msg');
        return false;
    } else {
        return true;
    }
}

function validerFormModifierThe() {
    var ck_alpha_num = new RegExp(/^[A-Za-zéèîêàâùÂÉÈÊÀÏÎÙ0-9 ]{3,20}$/);
    var ck_prix = new RegExp(/^[0-9]+(?:\.[0-9]+)?$/);
    var errors = [];
    var nom = $('#nomModifier').val();
    var description = $('#descriptionModifier').val();
    var prix = $('#prixModifier').val();

    if (!ck_alpha_num.test(nom)) {
        errors[errors.length] = "Entrez un nom de thé valide, entre 3 et 20 caractères";
    }

    if (description.length < 3) {
        errors[errors.length] = "Entrez une description de thé valide, entre 3 et 1000 caractères";
    }

    if (!ck_prix.test(prix)) {
        errors[errors.length] = "Entrez un prix de thé valide";
    }

    if (errors.length > 0) {
        reportErrors(errors, 'msg');
        return false;
    } else {
        return true;
    }
}