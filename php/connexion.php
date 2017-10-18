<?php
    session_start(); 
    require_once("../BD/connexion.inc.php");
    require '../layout/headerSimple.php';

    global $connexion;      
    $courriel = $motPasse = $message = "";  
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

                 if($isValid){
                    $requete="SELECT * FROM utilisateur WHERE courriel=? AND motPasse=?";
                    $stmt = $connexion->prepare($requete);
                    $stmt->bind_param("ss", $courriel, $motPasse);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $count  = mysqli_num_rows($result);
                    if($count>0){
                        if($ligne = $result->fetch_object()){
                            $_SESSION["SESS_idUtilisateur"] = $ligne->idUtilisateur;
                            $_SESSION["SESS_courriel"] = $ligne->courriel;
                            $_SESSION["SESS_motPasse"] = $ligne->motPasse;
                            $_SESSION["SESS_nom"] = $ligne->nom;
                            $_SESSION["SESS_prenom"] = $ligne->prenom;
                            $_SESSION["SESS_telephone"] = $ligne->telephone;                        
                            $_SESSION["SESS_noCivique"] = $ligne->noCivique;
                            $_SESSION["SESS_rue"] = $ligne->rue;
                            $_SESSION["SESS_appartement"] = $ligne->appartement;  
                            $_SESSION["SESS_codePostal"] = $ligne->codePostal;
                            $_SESSION["SESS_ville"] = $ligne->ville;
                            $_SESSION["SESS_province"] = $ligne->province;
                            $_SESSION["SESS_pays"] = $ligne->pays;
                            $_SESSION["SESS_categorie"] = $ligne->categorie;                                      
                            $stmt->close();
                            @mysqli_close($connexion);

                            if($_SESSION["SESS_categorie"]=='admin'){
                                header("Location: gestion.php");
                            }else{
                                header("Location: ../index.php");
                            }                                
                        }
                    }else {
                        $message = '<div id="msgConn">Nom usager ou mot de passe invalide!</div>';
                        @mysqli_close($connexion);
                    }
                 }             
    }    

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>    
    <div class="container connexion" id="formLogin">
        <div class="jumbotron connexion" id="jumbo">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="connexion">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-6">
                                    <a href="#" class="active" id="login-form-link"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp; CONNEXION</a>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <form id="formConnexion" action="" enctype="" method="POST" onSubmit="return validerFormConnexion();">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="courriel"><h3>Courriel</h3></label>
                                            <h3><input class="form-control input-lg" type="text" id="courriel" name="courriel" value="" required></h3>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="motPasse"><h3>Mot de passe</h3></label>
                                            <h4><input class="form-control input-lg" type="text" id="motPasse" name="motPasse" value="" required></h4>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-sm-offset-4" id="btnEnregistrer">
                                        <button class="btn btn-primary margin-bottom-none" type="submit"> <i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp; <h5>CONNEXION</h5git ></button>
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
    <script>        
        
    </script>
</body>

</html>