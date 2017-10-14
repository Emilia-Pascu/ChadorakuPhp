<?php
    session_start(); 
    require_once("../BD/connexion.inc.php");
    require '../layout/headerSimple.php';
?>

<?php
    global $connexion;                    
    $rep = "";
    if(!empty($_GET["idProduit"])){
        $idProduit = $_REQUEST['idProduit'];
        $requete="SELECT * FROM produit WHERE idProduit = ".$idProduit;
    } 
                                 
    $dossier="../pochette/";
    try{
        $listeFilms=mysqli_query($connexion,$requete);
        $rows=mysqli_num_rows($listeFilms);// nb total d'enregistrements de la base des données
        if($rows > 0) {
            $cols = 4;    // nb colonnes
            $counter = 1;     // compteur pour voir si on commence ou finit un row
            $nbsp = $cols - ($rows % $cols);    // reste de colonnes vides
            
            $container_class = 'container';  // conteneur parent
            $row_class = 'row';    // classe row
            $col_class = 'col-sm-3'; // classe col
            
            $rep.= '<div class="'.$container_class.'">';    // ouvrir conteneur
            while($ligne=mysqli_fetch_object($listeFilms)){                                
                if(($counter % $cols) == 1) {    // vérifier si on a un row nouveau
                    $rep.= '<div class="'.$row_class.'">';	// commence row nouveau
                }
                $rep.='<div class="'.$col_class.'"><form method="post" id="fProd" name="fProd" action="panier.php?action=add&nom='.$ligne->nom.'">';
                $rep.='<div class="thumbnail"><a href="detailProduit.php?idProduit='.$ligne->idProduit.'"><img src="'.$dossier.$ligne->image.'"';
                $rep.=' class="img-responsive" ></a>';               
                $rep.='<div class="caption"><h5><strong>'.$ligne->nom.'</strong></h5>';
                $rep.='<h5>'.$ligne->categorie.'</h5><h5><em>$ '.$ligne->prix.'</em></h5>';
                $rep.='<h5 class="client"><select id="quantite" name="quantite" ><option value="1">1</option><option value="2">2</option>';
                $rep.='<option value="3">3</option></select></h5><h5 class="client"><button type="submit" class="btn-success"><i class="fa fa-cart-plus"></i> Ajouter</button></h5></div></div></form></div>'; 
                                
                if(($counter % $cols) == 0) { // pour la dernière colonne du row le modulo sera 0
                    $rep.= '</div>';	 //  ferme le row
                }
                $counter++;    // incremente compteur                            
            }
            mysqli_free_result($listeFilms);
            if($nbsp > 0) { // pour les dernières colonnes du row
                for ($i = 0; $i < $nbsp; $i++)	{ 
                    $rep.= '<div class="'.$col_class.'">&nbsp;</div>';		
                }            
            }            
        }           
    }catch (Exception $e){
        echo "Probleme pour lister";
    }finally {
        $rep.="</div>";
        echo $rep;
        // echo $categorie;
    }            
    @mysqli_close($connexion);          
    ?>
        </div> <!-- /container -->
        <script>
           /* var categorie = "<?php echo $categorie; ?>";           
            categorie += ' <span class="caret"></span>';
            document.getElementById("dropCategorie").innerHTML = categorie; */

            var client = "<?php echo (isset($_SESSION["SESS_courriel"]) ? 'client' : 'visiteur'); ?>";   
            var btnCond = document.getElementsByClassName("client");
            var length = btnCond.length;
            for(var i = 0; i < length; i++) {
                if( client == 'visiteur'){
                    btnCond[i].style.display = 'none';
                }else{
                    btnCond[i].style.display = 'block';
                } 
            }          
        </script>
    </body>
</html>