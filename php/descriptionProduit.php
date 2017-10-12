<?php
    session_start(); 
    require_once("../BD/connexion.inc.php");
    require '../layout/headerSimple.php';
?>
<
<div class="container padded">
        <div class="row">
            <div class="col-lg-12">
                <h2>Matcha Choan</h2>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <img class="img-circle img-responsive" src="../images/matcha-choan.jpg">
               
            </div>
            <div class="col-sm-6">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <br>    
                <div class="col-sm-6 grey">
                        <p>20,00$ pour 60 grammes</p>
                    </div>
                    <div class="col-sm-6">
                        <p><a class="btn btn-default" href="php/matcha.php">Ajouter au panier</a></p>
                    </div>
            </div>
            
       </div>
    <!-- End Page Content -->