<?php
    session_start(); 
    require_once("../BD/connexion.inc.php");
    require '../layout/headerAdmin.php';
?>   

<form id= "formAction" name= "formAction"  action= "" method="POST">
    <input type="hidden" value="" id="inputCategorie" name="categorie">
    <input type="hidden" value="lister" name="action">
</form>

    <div class="container">
        <div class="row">
            <h3 class="tpad">Sélection de thé</h3>
        </div>
        <div class="row">
            <p>
                <a href="ajouterThe.php" class="btn btn-success">Ajouter</a>
            </p>

             <?php                
        global $connexion;
        $rep = "";
        
        if(!empty($_GET["categorie"])){
            $categorie = $_REQUEST['categorie'];
            $requete="SELECT * FROM produit WHERE categorie = ".$categorie;
        }
           else{
            $requete="SELECT * FROM produit ORDER BY nom ASC";                        
        }                  
        $rep.="<table class='table table-striped'>";
        $rep.="<thead><tr><th>Image</th><th>Nom</th><th class='descrip'>Description</th><th>Catégorie</th><th>Prix</th><th>Gestion</th></tr></thead><tbody>";
        $dossier="../pochette/";
        try{
            $listeFilms=mysqli_query($connexion,$requete);
            while($ligne=mysqli_fetch_object($listeFilms)){
                $rep.="<tr><td><img src='".$dossier.$ligne->image."' width='40'></td><td><span>".$ligne->nom."</span></td><td class='descrip'>".$ligne->description."</td><td>".$ligne->categorie."</td><td>".$ligne->prix."</td>";
                $rep.='<td>'.'<a class="btn btn-success" href="modifierThe.php?idProduit='.$ligne->idProduit.'">Modifier</a>'.' ';
                $rep.='<a class="btn btn-danger" href="supprimer.php?idProduit='.$ligne->idProduit.'">Supprimer</a>'.'</td></tr>';
            }
            mysqli_free_result($listeFilms);
        }catch (Exception $e){
            echo "Probleme pour lister";
        }finally {
            $rep.="</tbody></table>";
            echo $rep;
        }               
        @mysqli_close($connexion);                                     
        ?>    
           
        </div>
    </div>           
      <script>
           /* var categorie = "<?php echo (!empty($_POST) ? $categorie : 'CATÉGORIES'); ?>";           
            categorie += ' <span class="caret"></span>';
            document.getElementById("dropCategorieAdmin").innerHTML = categorie;      */  
        </script>    
</body>

</html>