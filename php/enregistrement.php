<?php
    session_start(); 
    require_once("../BD/connexion.inc.php");
    require '../layout/headerSimple.php';

    global $connexion;   
   
    $courriel = $motPasse = $nom = $prenom = $telephone = $appartement = $noCivique = $ville = $pays = $rue = $codePostal =  $message = "";  
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
        $requete="SELECT * FROM utilisateur WHERE courriel=?";
        $stmt = $connexion->prepare($requete);
        $stmt->bind_param("s", $courriel);
        $stmt->execute();
        $result = $stmt->get_result();
        $count  = mysqli_num_rows($result);
        if($count>0){
            $message = "Usager déjà existant";
        }else{
            $requete="INSERT INTO utilisateur values(0,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $connexion->prepare($requete);
            $stmt->bind_param("ssssssssssss", $nom,$prenom,$telephone,$courriel,$motPasse,$noCivique,$rue,$appartement,$codePostal,$ville,$pays,$categorie);
            $stmt->execute(); 
            $_SESSION["SESS_idUtilisateur"] = $connexion->insert_id;
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
            header("Location: ../index.php");
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
                                    <a href="#" class="active" id="login-form-link"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp; INFORMATIONS PERSONNELLES</a>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <form id="formEnregistrer" action="" enctype="" method="POST">
                                    <div class="col-sm-5 col-sm-offset-1">
                                        <div class="form-group">
                                            <label for="courriel"><i class="fa fa-user" aria-hidden="true"></i>&nbsp; Courriel</label>
                                            <input class="form-control input-lg" type="email" id="courriel" name="courriel" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="nom"> <i class="fa fa-user" aria-hidden="true"></i>&nbsp; Nom</label>
                                            <input class="form-control input-lg" type="text" id="nom" name="nom" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 col-sm-offset-1">
                                        <div class="form-group">
                                            <label for="motPasse"><i class="fa fa-user" aria-hidden="true"></i>&nbsp; Mot de passe</label>
                                            <input class="form-control input-lg" type="password" id="motPasse" name="motPasse" value="" required>
                                        </div>                                        
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="prenom"> <i class="fa fa-user" aria-hidden="true"></i>&nbsp; Prénom</label>
                                            <input class="form-control input-lg" type="text" id="prenom" name="prenom" value="" required>
                                        </div>
                                    </div>
                                     <div class="col-sm-5 col-sm-offset-1">
                                        <div class="form-group">
                                            <label for="confMotPasse"><i class="fa fa-user" aria-hidden="true"></i>&nbsp; Confirmer mot de passe</label>
                                            <input class="form-control input-lg" type="text" id="confMotPasse" name="confMotPasse" value="" required>
                                        </div>                                        
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="telephone"><i class="fa fa-user" aria-hidden="true"></i>&nbsp; Téléphone</label>
                                            <input class="form-control input-lg" type="text" id="telephone" name="telephone" value="" required>
                                        </div>                                        
                                    </div>                                    
                                    <div class="col-sm-2 col-sm-offset-1">
                                        <div class="form-group">
                                            <label for="appartement">App</label>
                                            <input class="form-control input-lg" type="text" id="appartement" name="appartement" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="noCivique">No</label>
                                            <input class="form-control input-lg" type="text" id="noCivique" name="noCivique" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="rue">Rue</label>
                                            <input class="form-control input-lg" type="text" id="rue" name="rue" value="" required>
                                        </div>                                        
                                    </div>
                                    <div class="col-sm-5 col-sm-offset-1">
                                        <div class="form-group">
                                            <label for="ville">Ville</label>
                                            <input class="form-control input-lg" type="text" id="ville" name="ville" value="" required>
                                        </div>                                        
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="prenom">Province</label>
                                            <input class="form-control input-lg" type="text" id="prenom" name="prenom" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 col-sm-offset-1">
                                        <div class="form-group">
                                            <label for="codePostal">Code postal</label>
                                            <input class="form-control input-lg" type="text" id="codePostal" name="codePostal" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="pays">Pays</label>
                                            <input class="form-control input-lg" type="text" id="pays" name="pays" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-sm-offset-4" id="btnEnregistrer">
                                        <button class="btn btn-primary margin-bottom-none" type="submit"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp; S'ENREGISTRER</button>
                                    </div>
                                </form>                                
                            </div>
                            <div class="col-sm-12 alert alert-success msg" > <?php echo $message;?></div> 
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