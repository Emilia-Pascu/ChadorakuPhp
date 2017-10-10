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
    <link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>   
    <script src="js/script.js"></script>  
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
                <li id="monCompte"><a href="php/modifierUtilisateur.php"><?php echo ((isset($_SESSION["SESS_categorie"]) && ($_SESSION["SESS_categorie"]) == 'client') ? 'Mon Compte' : ''); ?></a></li> 
                <li id="gestion"><a href="php/gestion.php"><?php echo ((isset($_SESSION["SESS_categorie"]) && ($_SESSION["SESS_categorie"]) == 'admin') ? 'Gestion' : ''); ?></a></li>               
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" id="verifSess"><?php echo (isset($_SESSION["SESS_courriel"]) ? $_SESSION["SESS_courriel"] : ''); ?></a></li>
                <li><a href="#" id="verifAdmin"><?php echo ((isset($_SESSION["SESS_categorie"])&& ($_SESSION["SESS_categorie"]) == 'admin') ? 'admin' : 'client'); ?></a></li>
                <li id="enreg"><a href="php/enregistrement.php"><?php echo (!isset($_SESSION["SESS_courriel"]) ? "<span><i class='fa fa-sign-in' aria-hidden='true'></i></span>&nbsp;S'inscrire" : ""); ?></a></li>
                <li id="connex"><a href="php/connexion.php"><?php echo (!isset($_SESSION["SESS_courriel"]) ? '<span><i class="fa fa-sign-in" aria-hidden="true"></i></span>&nbsp;Connexion' : ''); ?></a></li>
                <li id="deconnex"><a href="php/deconnexion.php"><?php echo (isset($_SESSION["SESS_courriel"]) ? '<span><i class="fa fa-sign-out" aria-hidden="true"></i></span>&nbsp;Déconnexion' : ''); ?></a></li>
            </ul>
        </div>
    </nav>