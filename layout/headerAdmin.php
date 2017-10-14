<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>       
    <script language="javascript" src="../js/jquery-3.2.1.min.js"></script>         
    <script language="javascript" src="../js/requetes.js"></script>
    <script language="javascript" src="../js/controleurView.js"></script>     	
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>     
    <script src="../js/script.js"></script> 
    <title>CHA DO RAKU</title>  
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
            <a class="navbar-brand" href="../index.php">CHA DO RAKU</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="../index.php">ACCUEIL</a></li>                  
                <li class="dropdown" >
                    <a class="dropdown-toggle" data-toggle="dropdown" id="dropCategorieAdmin" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; CATÉGORIES <span class="caret"></span></a>
                    <ul class="dropdown-menu" id="menuCategorieAdmin">
                        <li><a href="#">Matcha</a></li>
                        <li><a href="#">Sencha</a></li>
                        <li><a href="#">Gyokuro</a></li>
                        <li><a href="#">Hojicha</a></li> 
                        <li class="divider"></li>   
                        <li><a href="#">Tous les produits</a></li>                    
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" id="verifSess"><?php echo (isset($_SESSION["SESS_courriel"]) ? $_SESSION["SESS_courriel"] : ''); ?></a></li>  
                <li><a href="#" id="verifAdmin"><?php echo ((isset($_SESSION["SESS_categorie"])&& ($_SESSION["SESS_categorie"]) == 'admin') ? 'admin' : 'client'); ?></a></li>              
                <li id="deconnex"><a href="deconnexion.php"><span><i class="fa fa-sign-out" aria-hidden="true"></i></span>&nbsp; DÉCONNEXION</a></li>
            </ul>
        </div>
    </nav>