<?php
    session_start(); 
    require_once("../BD/connexion.inc.php");
    require '../layout/headerSimple.php';
?>

<form id= "formAction" name= "formAction"  action= "" method="POST">
    <input type="hidden" value="" id="inputCategorie" name="categorie">           
</form>

<div class="ftr-matcha">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="text-muted">MATCHA</h1>
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Intro Text -->
<div class="container padded">
        <div class="row">
            <div class="col-lg-12">
                <h2>Notre sélection de matcha</h2>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <img class="img-circle img-responsive" src="../images/matcha-choan.jpg">
                <h3>Matcha Choan</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <p><a class="btn btn-default" href="php/matcha.php">Ajouter au panier</a></p>
            </div>
            <div class="col-sm-6 col-md-3">
                <img class="img-circle img-responsive" src="../images/matcha-fuka-midori.jpg">
                <h3>Matcha Fuka Midori</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <p><a class="btn btn-default" href="#">Ajouter au panier</a></p>
            </div>
            <div class="clearfix hidden-md hidden-lg"></div>
            <div class="col-sm-6 col-md-3">
                <img class="img-circle img-responsive" src="../images/matcha-sendo.jpg">
                <h3>Matcha Sendo</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <p><a class="btn btn-default" href="#">Ajouter au panier</a></p>
            </div>
            <div class="col-sm-6 col-md-3">
                <img class="img-circle img-responsive" src="../images/matcha-taiki.jpg">
                <h3>Matcha Taiki</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <p><a class="btn btn-default" href="#">Ajouter au panier</a></p>
            </div>
        </div>
    </div>
    <!-- End Page Content -->