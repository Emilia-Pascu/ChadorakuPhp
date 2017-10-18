<?php
    session_start(); 
    require_once("../BD/connexion.inc.php");
    require '../layout/headerAdmin.php';
?>   

    <div class="container">
        <div class="row">
            <h3 class="tpad">Commentaires</h3>
        </div>
        <div class="row">
             <?php                
        global $connexion;
        $rep = "";
        $requete="SELECT * FROM commentaire ORDER BY idCommentaire DESC";                                             
        $rep.="<table class='table table-striped'>";
        $rep.="<thead><tr><th>Nom</th><th>Courriel</th><th>Commentaire</th></tr></thead><tbody>";
        try{
            $listeFilms=mysqli_query($connexion,$requete);
            while($ligne=mysqli_fetch_object($listeFilms)){
                $rep.="<tr><td><span>".$ligne->nom."</span></td><td>".$ligne->courriel."</td><td>".$ligne->description."</td>";
                $rep.='</td></tr>';
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