<?php
    session_start(); 
    require_once("../BD/connexion.inc.php");
    require '../layout/headerSimple.php';
?>
<div class="container">
    <div class="jumbotron"
<div class="row">
    <div class="col-sm-6">
    <img class="img-responsive" src="../images/800px_Geisha.jpg">
    </div>
    <div class="col-sm-6">
        <div id="divChat">
            <form name="frmChat" id="frmChat">
                <div id="chat-box"></div>
                    <input type="text" name="chat-user" id="chat-user" placeholder="Nom" class="chat-input" required />
                    <input type="text" name="chat-message" id="chat-message" placeholder="Message"  class="chat-input chat-message" required />
                    <input type="submit" id="btnSend" name="send-chat-message" value="Envoyer" >
            </form>
        </div>
    </div>
</div>
</div>
</div>
