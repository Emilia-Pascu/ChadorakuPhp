<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Chadoraku</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>   
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Cha Do Raku</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Accueil</a></li>
                <li><a href="php/modifierUtilisateur.php">Mon Compte</a></li> 
                 <li><a href="php/gestion.php"><?php echo ((isset($_SESSION["SESS_categorie"]) && ($_SESSION["SESS_categorie"]) == 'admin') ? 'Gestion' : ''); ?></a></li>               
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><?php echo (isset($_SESSION["SESS_courriel"]) ? $_SESSION["SESS_courriel"] : ''); ?></a></li>
                <li><a href="php/enregistrement.php">S'inscrire</a></li>
                <li><a href="php/connexion.php">Connexion</a></li>
                <li><a href="php/deconnexion.php">Déconnexion</a></li>
            </ul>
        </div>
    </nav>