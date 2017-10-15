<?php
    session_start(); 
    require_once("../BD/connexion.inc.php");
    require '../layout/headerSimple.php';
?>

<!--form id= "formAction" name= "formAction"  action= "" method="POST">
    <input type="hidden" value="" id="inputCategorie" name="categorie">           
</form-->

<?php
    global $connexion;                    
    $rep = "";     
    $rep.='<div class="ftr-matcha">';
    $rep.= '<div class="container">';
    $rep.= '<div class="row"><div class="col-xs-12">';
    
    if(!empty($_GET["categorie"])){
        $categorie = $_REQUEST['categorie'];
        $requete="SELECT * FROM produit WHERE categorie = ".$categorie;
        //entête
   
    $rep.= '<h1 class="text-muted">'.$categorie.'</h1>';
    $rep.='<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p></div></div></div></div>';
    $rep.='<div class="container padded">
    <div class="row">
        <div class="col-lg-12">
            <h2>Notre sélection de'.$categorie.'</h2>
            <hr>
        </div>
    </div>';
    //fin entête
    }else{
        $requete="SELECT * FROM produit ORDER BY idProduit DESC";
        //entête   
    $rep.= '<h1 class="text-muted">Tous nos Thés</h1>';
    $rep.='<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p></div></div></div></div>';
    //fin entête    
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
            // $ligne=mysqli_fetch_object($listeFilms);
            
            while($ligne=mysqli_fetch_object($listeFilms)){
                                                
                if(($counter % $cols) == 1) {    // vérifier si on a un row nouveau
                    $rep.= '<div class="'.$row_class.'">';	// commence row nouveau
                }
                $rep.='<div class="'.$col_class.'"><form method="post" id="fProd" name="fProd" action="panier.php?action=add&nom='.$ligne->nom.'">';
                $rep.='<div ><a href="detailProduit.php?idProduit='.$ligne->idProduit.'"><img src="'.$dossier.$ligne->image.'"';
                $rep.=' class=" img-circle img-responsive" ></a>';               
                $rep.='<div class="caption"><h3><strong>'.$ligne->nom.'</strong></h3>';
                $rep.='<h5><em>$ '.$ligne->prix.'</em></h5>';

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