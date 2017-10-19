<?php
    session_start(); 
    require_once("../BD/connexion.inc.php");
    require '../layout/headerSimple.php';
    
    global $connexion;   
   
    $idUtilisateur = $courriel = $motPasse = $nom = $prenom = $telephone = $appartement = $noCivique = $ville = $province = $pays = $rue = $codePostal =  $message = "";  
    $isValid = true;
    if (!empty($_POST)) {  
        if (empty($_POST["courriel"])) {
                    $message .= "Le courriel est requis<br/>";
                    $isValid = false;
                } else {
                    $courriel = test_input($_POST["courriel"]);             
                    if (!preg_match("/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i",$courriel)) {
                        $message .= "Entrez le courriel dans le format spécifié<br/>"; 
                        $isValid = false;
                    }
                }  
        if (empty($_POST["motPasse"])) {
                    $message .= "Le mot de passe est requis<br/>";
                    $isValid = false;
                } else {
                    $motPasse = test_input($_POST["motPasse"]);            
                    if (!preg_match("/^[A-Za-zÀ-ÿ0-9!@#$%^&*()_]{5,20}$/",$motPasse)) {
                        $message .= "Entrez le mot de passe dans le format spécifié<br/>"; 
                        $isValid = false;
                    }
                } 
        if (empty($_POST["nom"])) {
                    $message .= "Le nom est requis<br/>";
                    $isValid = false;
                } else {
                    $nom = test_input($_POST["nom"]);         
                    if (!preg_match("/^[A-Za-zéèîêàâùÂÉÈÊÀÏÎÙ0-9 ]{3,20}$/",$nom)) {
                        $message .= "Entrez le nom dans le format spécifié<br/>"; 
                        $isValid = false;
                    }
                } 
        if (empty($_POST["prenom"])) {
                    $message .= "Le prénom est requis<br/>";
                    $isValid = false;
                } else {
                    $prenom = test_input($_POST["prenom"]);    
                    if (!preg_match("/^[A-Za-zéèîêàâùÂÉÈÊÀÏÎÙ0-9 ]{3,20}$/",$prenom)) {
                        $message .= "Entrez le prénom dans le format spécifié<br/>"; 
                        $isValid = false;
                    }
                } 
        if (empty($_POST["telephone"])) {
                    $message .= "Le téléphone est requis<br/>";
                    $isValid = false;
                } else {
                    $telephone = test_input($_POST["telephone"]);    
                    if (!preg_match("/^[0-9]{10,12}$/",$telephone)) {
                        $message .= "Entrez le téléphone dans le format spécifié<br/>"; 
                        $isValid = false;
                    }
                } 
         if (!empty($_POST["appartement"])) {
            $appartement = test_input($_POST["appartement"]);
            if (!preg_match("/^[0-9]*[a-zA-Z]*$/",$appartement)) {
                $message .= "Entrez l'appartement dans le format spécifié<br/>"; 
                $isValid = false;
                }
            }else{
                $appartement = "SO";
            }
        if (empty($_POST["noCivique"])) {
                    $message .= "Le numéro civique est requis<br/>";
                    $isValid = false;
                } else {
                    $noCivique = test_input($_POST["noCivique"]);  
                    if (!preg_match("/^[0-9]+[a-zA-Z]*$/",$noCivique)) {
                        $message .= "Entrez le numéro civique dans le format spécifié<br/>"; 
                        $isValid = false;
                    }
                } 
        if (empty($_POST["ville"])) {
                    $message .= "La ville est requise<br/>";
                    $isValid = false;
                } else {
                    $ville = test_input($_POST["ville"]);
                    if (!preg_match("/^[a-zA-ZéèîêàâùÂÉÈÊÀÏÎÙ]+$/",$ville)) {
                        $message .= "Entrez la ville dans le format spécifié<br/>"; 
                        $isValid = false;
                    }
                } 
        if (empty($_POST["pays"])) {
                    $message .= "Le pays est requis<br/>";
                    $isValid = false;
                } else {
                    $pays = test_input($_POST["pays"]);
                    if (!preg_match("/^[a-zA-ZéèîêàâùÂÉÈÊÀÏÎÙ]+$/",$pays)) {
                        $message .= "Entrez le pays dans le format spécifié<br/>"; 
                        $isValid = false;
                    }
                } 
        if (empty($_POST["rue"])) {
                    $message .= "La rue est requise<br/>";
                    $isValid = false;
                } else {
                    $rue = test_input($_POST["rue"]);
                    if (!preg_match("/^[a-zA-ZéèîêàâùÂÉÈÊÀÏÎÙ0-9]+$/",$rue)) {
                        $message .= "Entrez la rue dans le format spécifié<br/>"; 
                        $isValid = false;
                    }
                } 
        if (empty($_POST["codePostal"])) {
                    $message .= "Le code postal est requis<br/>";
                    $isValid = false;
                } else {
                    $codePostal = test_input($_POST["codePostal"]);   
                    if (!preg_match("/^[ABCEGHJKLMNPRSTVXY]\d[ABCEGHJKLMNPRSTVWXYZ]( )?\d[ABCEGHJKLMNPRSTVWXYZ]\d$/i",$codePostal)) {
                        $message .= "Entrez le code postal dans le format spécifié<br/>"; 
                        $isValid = false;
                    }
                }  
        if (empty($_POST["province"])) {
                    $message .= "La province est requise<br/>";
                    $isValid = false;
                } else {
                    $province = test_input($_POST["province"]);
                    if (!preg_match("/^[a-zA-ZéèîêàâùÂÉÈÊÀÏÎÙ]+$/",$province)) {
                        $message .= "Entrez la province dans le format spécifié<br/>"; 
                        $isValid = false;
                    }
                }     
                     
        $categorie = "client";     
        $idUtilisateur =  $_SESSION["SESS_idUtilisateur"];

        if($isValid){
            $requete="UPDATE utilisateur SET nom=?,prenom=?,telephone=?,courriel=?,motPasse=?,noCivique=?,rue=?,appartement=?,codePostal=?,ville=?,province=?,pays=?,categorie=? WHERE idUtilisateur=?";
            $stmt = $connexion->prepare($requete);
            $stmt->bind_param("sssssssssssssi", $nom,$prenom,$telephone,$courriel,$motPasse,$noCivique,$rue,$appartement,$codePostal,$ville,$province,$pays,$categorie,$idUtilisateur);
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
            $_SESSION["SESS_province"] = $province;
            $_SESSION["SESS_pays"] = $pays;
            $_SESSION["SESS_categorie"] = $categorie;  
            $message = "Votre profil a été mis à jour";
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
                    <form id="formModifier" action="" enctype="" method="POST" onSubmit="return validerFormModifier();">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="courriel">Courriel</label>
                                <input class="form-control input-lg" type="text" id="courriel" name="courriel" value="<?php echo $_SESSION["SESS_courriel"]; ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="motPasse">Mot de passe</label>
                                <input class="form-control input-lg" type="text" id="motPasse" name="motPasse" value="<?php echo $_SESSION["SESS_motPasse"]; ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input class="form-control input-lg" type="text" id="nom" name="nom" value="<?php echo $_SESSION["SESS_nom"]; ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="prenom">Prénom</label>
                                <input class="form-control input-lg" type="text" id="prenom" name="prenom" value="<?php echo $_SESSION["SESS_prenom"]; ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="telephone">Téléphone</label>
                                <input class="form-control input-lg" type="text" id="telephone" name="telephone" value="<?php echo $_SESSION["SESS_telephone"]; ?>" required>
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
                                <input class="form-control input-lg" type="text" id="noCivique" name="noCivique" value="<?php echo $_SESSION["SESS_noCivique"]; ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="rue">Rue</label>
                                <input class="form-control input-lg" type="text" id="rue" name="rue" value="<?php echo $_SESSION["SESS_rue"]; ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="ville">Ville</label>
                                <input class="form-control input-lg" type="text" id="ville" name="ville" value="<?php echo $_SESSION["SESS_ville"]; ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="codePostal">Code postal</label>
                                <input class="form-control input-lg" type="text" id="codePostal" name="codePostal" value="<?php echo $_SESSION["SESS_codePostal"]; ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="province">Province</label>
                                <input class="form-control input-lg" type="text" id="province" name="province" value="<?php echo $_SESSION["SESS_province"]; ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="pays">Pays</label>
                                <input class="form-control input-lg" type="text" id="pays" name="pays" value="<?php echo $_SESSION["SESS_pays"]; ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-6 col-sm-offset-3" id="btnModifier">
                            <button class="btn btn-primary margin-bottom-none" type="submit">Mettre à jour</button>
                        </div>
                    </form>                    
                </div>
                <div class="col-sm-12 alert alert-success msg" id="msg"> <?php echo $message;?></div>
            </div>
        </div>
    </div>
    <script>        
        var quantiteTotale = "<?php echo isset($_SESSION["cart_item"]) ? $_SESSION["quantiteAchats"]: ''; ?>";
        var prixTotal = "<?php echo isset($_SESSION["cart_item"]) ? $_SESSION["valeurAchats"]: ''; ?>";	
        remplirPanier(quantiteTotale, prixTotal);
    </script>
</body>

</html>