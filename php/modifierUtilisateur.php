<?php
    session_start(); 
    require_once("../BD/connexion.inc.php");
    require '../layout/headerSimple.php';
    
    global $connexion;   
   
    $idUtilisateur = $courriel = $motPasse = $nom = $prenom = $telephone = $appartement = $noCivique = $ville = $pays = $rue = $codePostal =  $message = "";  
    $isValid = true;
    if (!empty($_POST)) {   
        $courriel = test_input($_POST["courriel"]);
        $motPasse = test_input($_POST["motPasse"]); 
        $nom = test_input($_POST["nom"]);
        $prenom = test_input($_POST["prenom"]);
        $telephone = test_input($_POST["telephone"]); 
        if (!empty($_POST["appartement"])) {
            $appartement = test_input($_POST["appartement"]);
        }else{
            $appartement = "s/o";
        }
        $noCivique = test_input($_POST["noCivique"]);
        $ville = test_input($_POST["ville"]);
        $pays = test_input($_POST["pays"]); 
        $rue = test_input($_POST["rue"]);
        $codePostal = test_input($_POST["codePostal"]);       
        $categorie = "client";     
        $idUtilisateur =  $_SESSION["SESS_idUtilisateur"];
            $requete="UPDATE utilisateur SET nom=?,prenom=?,telephone=?,courriel=?,motPasse=?,noCivique=?,rue=?,appartement=?,codePostal=?,ville=?,pays=?,categorie=? WHERE idUtilisateur=?";
            $stmt = $connexion->prepare($requete);
            $stmt->bind_param("ssssssssssssi", $nom,$prenom,$telephone,$courriel,$motPasse,$noCivique,$rue,$appartement,$codePostal,$ville,$pays,$categorie,$idUtilisateur);
            $stmt->execute();            
            $_SESSION["SESS_nom"] = $nom;
            $_SESSION["SESS_prenom"] = $prenom;
            $_SESSION["SESS_telephone"] = $telephone;
            $_SESSION["SESS_courriel"] = $courriel;
            $_SESSION["SESS_motPasse"] = $motPasse;
            $_SESSION["SESS_noCivique"] = $noCivique;
            $_SESSION["SESS_rue"] = $rue;
            $_SESSION["SESS_appartement"] = $appartement;  
            $_SESSION["SESS_codePostal"] = $codePostal;
            $_SESSION["SESS_ville"] = $ville;
            $_SESSION["SESS_pays"] = $pays;
            $_SESSION["SESS_categorie"] = $categorie;  
            $message = "Votre profil a été mis à jour";
        
    }
    
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    @mysqli_close($connexion);  


?>   
    <div class="container">
        <div class="page-header">
            <h3 class="tpad">INFORMATIONS PERSONNELLES</h3>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <img class="img-responsive" src="../images/geisha_11.jpg" width="100%" height="100%">
            </div>
            <div class="col-sm-8">
                <div class="row">
                    <form id="formModifier" action="" enctype="" method="POST">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="courriel">Courriel</label>
                                <input class="form-control input-lg" type="text" id="courriel" name="courriel" value="<?php echo $_SESSION["SESS_courriel"]; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="motPasse">Mot de passe</label>
                                <input class="form-control input-lg" type="text" id="motPasse" name="motPasse" value="<?php echo $_SESSION["SESS_motPasse"]; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input class="form-control input-lg" type="text" id="nom" name="nom" value="<?php echo $_SESSION["SESS_nom"]; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="prenom">Prénom</label>
                                <input class="form-control input-lg" type="text" id="prenom" name="prenom" value="<?php echo $_SESSION["SESS_prenom"]; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="telephone">Téléphone</label>
                                <input class="form-control input-lg" type="text" id="telephone" name="telephone" value="<?php echo $_SESSION["SESS_telephone"]; ?>">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="appartement">Appartement</label>
                                <input class="form-control input-lg" type="text" id="appartement" name="appartement" value="<?php echo $_SESSION["SESS_appartement"]; ?>">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="noCivique">No civique</label>
                                <input class="form-control input-lg" type="text" id="noCivique" name="noCivique" value="<?php echo $_SESSION["SESS_noCivique"]; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="rue">Rue</label>
                                <input class="form-control input-lg" type="text" id="rue" name="rue" value="<?php echo $_SESSION["SESS_rue"]; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="ville">Ville</label>
                                <input class="form-control input-lg" type="text" id="ville" name="ville" value="<?php echo $_SESSION["SESS_ville"]; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="codePostal">Code postal</label>
                                <input class="form-control input-lg" type="text" id="codePostal" name="codePostal" value="<?php echo $_SESSION["SESS_codePostal"]; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="pays">Pays</label>
                                <input class="form-control input-lg" type="text" id="pays" name="pays" value="<?php echo $_SESSION["SESS_pays"]; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6 col-sm-offset-3" id="btnModifier">
                            <button class="btn btn-primary margin-bottom-none" type="submit">Mettre à jour</button>
                        </div>
                    </form>                    
                </div>
                <div class="col-sm-12 alert alert-success msg" > <?php echo $message;?></div>
            </div>
        </div>
    </div>
    <script>        
        
    </script>
</body>

</html>