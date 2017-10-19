<?php
    session_start();
    require_once("../BD/connexion.inc.php");
    require '../layout/headerSimple.php';

    global $connexion; 
    $nom = $description = $prix = $categorie = $message = "";
    $isValid = true;
  
    $idProduit = $_REQUEST['idProduit'];   
    if ( !empty($_POST)) {
        if (empty($_POST["nomModifier"])) {
                    $message .= "Le nom est requis<br/>";
                    $isValid = false;
                } else {
                    $nomModifier = test_input($_POST["nomModifier"]);           
                    if (!preg_match("/^[A-Za-zéèîêàâùÂÉÈÊÀÏÎÙ0-9 ]{3,20}$/",$nomModifier)) {
                        $message .= "Entrez le nom dans le format spécifié<br/>"; 
                        $isValid = false;
                    }
                } 
       if (empty($_POST['descriptionModifier'])) {
                    $message .= "La description est requise<br/>";
                    $isValid = false;
                } else {
                    $descriptionModifier = test_input($_POST['descriptionModifier']);                   
                }            
       if (empty($_POST['prixModifier'])) {
                    $message .= "Le prix est requis<br/>";
                    $isValid = false;
                } else {
                    $prixModifier = test_input($_POST['prixModifier']);           
                    if (!preg_match("/^[0-9]+(?:\.[0-9]+)?$/",$prixModifier)) {
                        $message .= "Entrez le prix dans le format spécifié<br/>"; 
                        $isValid = false;
                    }
                } 
               
        $categorieModifier = $_POST['categorieModifier'];      
        $dossier="../pochette/";
        $nomFichier="avatar.jpg";

        if($isValid){
            if($_FILES['imageModifier']['tmp_name']!==""){
                $requete="SELECT * FROM produit WHERE idProduit=?";
                $stmt = $connexion->prepare($requete);
                $stmt->bind_param("i", $idProduit);
                $stmt->execute();
                $result = $stmt->get_result();
                if($ligne = $result->fetch_object())
                    if ($ligne->image!="avatar.jpg")
                        unlink($dossier.$ligne->image);
                    
                $tmp = $_FILES['imageModifier']['tmp_name'];
                $fichier= $_FILES['imageModifier']['name'];
                $extension=strrchr($fichier,'.');
                $nomFichier=sha1($nomModifier.time()).$extension;//générer un nom de film
                @move_uploaded_file($tmp,$dossier.$nomFichier);
                    
                @unlink($tmp); //effacer le fichier temporaire
                $requete="UPDATE produit set nom=?,description=?,prix=?,image='$nomFichier',categorie=? WHERE idProduit=?";
            }else
                $requete="UPDATE produit set nom=?,description=?,prix=?,categorie=? WHERE idProduit=?";
                
                $stmt = $connexion->prepare($requete);
                $stmt->bind_param("ssdsi",$nomModifier,$descriptionModifier,$prixModifier, $categorieModifier, $idProduit);
                $stmt->execute();  
                header("Location: gestion.php");        
        }                         
    } else {       
        $requete="SELECT * FROM produit WHERE idProduit=?";
        $stmt = $connexion->prepare($requete);
        $stmt->bind_param("i", $idProduit);
        $stmt->execute();
        $result = $stmt->get_result();
        if($ligne = $result->fetch_object()){
            $nomModifier = $ligne->nom;
            $descriptionModifier = $ligne->description;
            $prixModifier = $ligne->prix;
            $categorieModifier = $ligne->categorie;            
            $stmt->close();
        }
             
    }
    
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }   
    @mysqli_close($connexion);                 
?>    
<div class="container" id="formLogin">
        <div class="jumbotron" id="jumbo">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-login">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-6">
                                    <a href="#" class="active" id="login-form-link"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp; MODIFIER UN PRODUIT</a>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <form id="formModifier" class="form-horizontal" action="modifierThe.php?idProduit=<?php echo $idProduit?>" enctype="multipart/form-data" method="POST" onSubmit="return validerFormModifierThe();">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="nomModifier">Nom thé</label>
                                            <input class="form-control input-lg" type="text" id="nomModifier" name="nomModifier" value="<?php echo !empty($nomModifier)?$nomModifier:'';?>" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="descriptionModifier">Description thé</label>
                                            <input class="form-control input-lg" type="text" id="descriptionModifier" name="descriptionModifier" value="<?php echo !empty($descriptionModifier)?$descriptionModifier:'';?>" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="prixModifier">Prix unitaire</label>
                                            <input class="form-control input-lg" type="number" min="1" max="100" step="0.01" id="prixModifier" name="prixModifier" value="<?php echo !empty($prixModifier)?$prixModifier:'';?>" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="categorieModifier">Catégorie thé</label>
                                            <select class="form-control input-lg" id="categorieModifier" name="categorieModifier">                                                
                                                <option value="Matcha" <?php echo ($categorieModifier == "Matcha" ? "selected" : ""); ?>>Matcha</option>
                                                <option value="Sencha" <?php echo ($categorieModifier == "Sencha" ? "selected" : ""); ?>>Sencha</option>
                                                <option value="Gyokuro" <?php echo ($categorieModifier == "Gyokuro" ? "selected" : ""); ?>>Gyokuro</option>
                                                <option value="Hojicha" <?php echo ($categorieModifier == "Hojicha" ? "selected" : ""); ?>>Hojicha</option>                                                
                                            </select>                                            
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">  
                                            <label for="imageModifier">Image thé</label>                                          
                                            <input type="file" id="imageModifier" name="imageModifier">                                             
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-sm-offset-4" id="btnEnregistrer">                                       
                                        <button class="btn btn-primary margin-bottom-none" type="submit"> <i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp; MODIFIER</button>
                                        <a class="btn btn-danger" href="gestion.php">ANNULER</a> 
                                    </div>                  
                                </form>                            
                            </div> 
                            <div class="col-sm-12 alert alert-success msg" id="msg"> <?php echo $message;?></div>                          
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