<?php
    session_start();
    require_once("../BD/connexion.inc.php");
    require '../layout/headerSimple.php';
  
    $idProduit = $_REQUEST['idProduit'];   
    if ( !empty($_POST)) {
        global $connexion;           
        $nomModifier = $_POST['nomModifier'];
        $descriptionModifier = $_POST['descriptionModifier'];
        $prixModifier = $_POST['prixModifier'];
        $categorieModifier = $_POST['categorieModifier'];        
    
        $dossier="../pochette/";
        $nomFichier="avatar.jpg";
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
        @mysqli_close($connexion); 
        header("Location: gestion.php");                    
    } else {
        global $connexion;
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
            @mysqli_close($connexion);     
    }                
?>    
                <div class="container">
                    <div class="jumbotron" id="jumbo">
                        <div class="page-header">
                            <h1>Modifier un produit</h1>
                        </div>
                        <form id="formModifier" class="form-horizontal" action="modifierThe.php?idProduit=<?php echo $idProduit?>" enctype="multipart/form-data" method="POST" onsubmit="return validerMod();">
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
                                    <input class="form-control input-lg" type="number" min="1" max="50" step="0.01" id="prixModifier" name="prixModifier" value="<?php echo !empty($prixModifier)?$prixModifier:'';?>" required>
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
                </div>
            </div>
        </div>
    </body>
</html>