<?php
    session_start();
    require_once("../BD/connexion.inc.php");
    require '../layout/headerSimple.php';
    $idProduit = $_REQUEST['idProduit'];     
        
    if ( !empty($_POST)) {
        global $connexion;        
       
        $requete="SELECT * FROM produit WHERE idProduit=?";
        $stmt = $connexion->prepare($requete);
        $stmt->bind_param("i", $idProduit);
        $stmt->execute();
        $result = $stmt->get_result();
        $dossier="../pochette/";
        if($ligne = $result->fetch_object()){
            $pochette=$ligne->pochette;
            unlink($dossier.$pochette);
            $requete="DELETE FROM produit WHERE idProduit=?";
            $stmt = $connexion->prepare($requete);
            $stmt->bind_param("i", $idProduit);
            $stmt->execute();
            echo "Produit ".$idProduit." bien enleve";
        }              
         @mysqli_close($connexion);
         header("Location: gestion.php");
    }
?>    
        <div class="container">
            <div class="jumbotron" id="jumbo">                
                <div class="span10 offset1">
                    <div class="row">
                        <h1>Supprimer un thé</h1>
                    </div>                     
                    <form class="form-horizontal" action="supprimer.php" method="post">
                      <input type="hidden" name="idProduit" value="<?php echo $idProduit;?>"/>
                      <p class="alert alert-error">Voulez-vous le supprimer?</p>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-danger">Oui</button>
                          <a class="btn btn-default" href="gestion.php">Non</a>
                        </div>
                    </form>
                </div>               
            </div>
        </div>         
    </body>
</html>