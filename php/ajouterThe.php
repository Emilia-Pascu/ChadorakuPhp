<?php
    session_start(); 
    require_once("../BD/connexion.inc.php");
    require '../layout/headerAdmin.php';

    if ( !empty($_POST)) {
    require_once("../BD/connexion.inc.php");
    global $connexion;
	$titreFilm=$_POST['titreFilm'];
    $realisateurFilm=$_POST['realisateurFilm'];
    $categorieFilm=$_POST['categorieFilm'];
	$dureeFilm=$_POST['dureeFilm'];
    $prixFilm=$_POST['prixFilm'];
    $urlFilm = $_POST['urlFilm'];
	$rep="../pochette/";
	$nomFichier="avatar.jpg";
	if($_FILES['pochetteFilm']['tmp_name']!==""){
		//Upload de la photo
		$tmp = $_FILES['pochetteFilm']['tmp_name'];
		$fichier= $_FILES['pochetteFilm']['name'];
		$extension=strrchr($fichier,'.');
		$nomFichier=sha1($titreFilm.time()).$extension;//générer un nom de film
		@move_uploaded_file($tmp,$rep.$nomFichier);
		// Enlever le fichier temporaire chargé
		@unlink($tmp); //effacer le fichier temporaire
	}
	$requete="INSERT INTO film values(0,?,?,?,?,?,?,?)";
	$stmt = $connexion->prepare($requete);
	$stmt->bind_param("sssidss", $titreFilm,$realisateurFilm,$categorieFilm,$dureeFilm,$prixFilm,$nomFichier,$urlFilm);
	$stmt->execute();
    @mysqli_close($connexion);
    header("Location: gestion.php");
} 
?>   

<div class="container" id="formLogin">
        <div class="jumbotron" id="jumbo">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-login">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-6">
                                    <a href="#" class="active" id="login-form-link"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp; AJOUTER UN PRODUIT</a>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <form id="formEnregistrer" action="ajouterThe.php" enctype="multipart/form-data" method="POST">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="nom">Nom thé</label>
                                            <input class="form-control input-lg" type="text" id="nom" name="nom" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="description">Description thé</label>
                                            <input class="form-control input-lg" type="text" id="description" name="description" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="prix">Prix unitaire</label>
                                            <input class="form-control input-lg" type="number" min="1" max="50" step="0.01" id="prix" name="prix" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="categorie">Catégorie thé</label>
                                            <input class="form-control input-lg" type="text" id="description" name="description" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-sm-offset-4" id="btnEnregistrer">
                                        <button class="btn btn-primary margin-bottom-none" type="submit"> <i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp; CONNEXION</button>
                                    </div>
                                </form>                                
                            </div>                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>        
     
    </script>
</body>

</html>
