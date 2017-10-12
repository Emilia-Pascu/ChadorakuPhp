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