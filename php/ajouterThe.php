<?php
    session_start(); 
    require_once("../BD/connexion.inc.php");
    require '../layout/headerSimple.php';

    if ( !empty($_POST)) {    
    global $connexion;
	$nom=$_POST['nom'];
    $description=$_POST['description'];
    $prix=$_POST['prix'];
	$categorie=$_POST['categorie'];    
	$rep="../pochette/";
	$nomFichier="avatar.jpg";
	if($_FILES['image']['tmp_name']!==""){
		//Upload de la photo
		$tmp = $_FILES['image']['tmp_name'];
		$fichier= $_FILES['image']['name'];
		$extension=strrchr($fichier,'.');
		$nomFichier=sha1($nom.time()).$extension;//générer un nom de film
		@move_uploaded_file($tmp,$rep.$nomFichier);
		// Enlever le fichier temporaire chargé
		@unlink($tmp); //effacer le fichier temporaire
	}
	$requete="INSERT INTO produit values(0,?,?,?,?,?)";
	$stmt = $connexion->prepare($requete);
	$stmt->bind_param("ssdss", $nom,$description,$prix,$nomFichier,$categorie);
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
                                            <input class="form-control input-lg" type="number" min="1" max="100" step="0.01" id="prix" name="prix" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="categorie">Catégorie thé</label>
                                            <select class="form-control input-lg" id="categorie" name="categorie" required>
                                                <option value="" disabled selected hidden>Toutes les catégories de thé</option>
                                                <option value="Matcha">Matcha</option>
                                                <option value="Sencha">Sencha</option>
                                                <option value="Gyokuro">Gyokuro</option>
                                                <option value="Hojicha">Hojicha</option>                                                
                                            </select>                                            
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">  
                                            <label for="image">Image thé</label>                                          
                                            <input type="file" id="image" name="image">                                             
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-sm-offset-4" id="btnEnregistrer">
                                        <button class="btn btn-primary margin-bottom-none" type="submit"> <i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp; AJOUTER</button>
                                        <a class="btn btn-danger" href="gestion.php">Annuler</a> 
                                    </div>
                                </form>                                
                            </div>                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        require '../layout/footer.php';
    ?>
    <script>        
     
    </script>
</body>

</html>
