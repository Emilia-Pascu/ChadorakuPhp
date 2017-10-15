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