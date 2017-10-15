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
            $rep.= "<div class=\"container padded\">\n"; 
            if($ligne=mysqli_fetch_object($listeFilms)){                    
                $rep.='<form method="post" id="fProd" name="fProd" action="panier.php?action=add&nom='.$ligne->nom.'">';
                $rep.= "        <div class=\"row\">\n"; 
                $rep.= "            <div class=\"col-lg-12\">\n"; 
                $rep.= "                <h2>".$ligne->nom."</h2>\n"; 
                $rep.= "                <hr>\n"; 
                $rep.= "            </div>\n"; 
                $rep.= "        </div>\n"; 
                $rep.= "        <div class=\"row\">\n"; 
                $rep.= "            <div class=\"col-sm-6\">\n"; 
                $rep.= "                <img class=\"img-circle img-responsive\" src=\"".$dossier.$ligne->image."\">\n"; 
                $rep.= "               \n"; 
                $rep.= "            </div>\n"; 
                $rep.= "            <div class=\"col-sm-6\">\n"; 
                $rep.= "                <p>".$ligne->description."</p>\n"; 
                $rep.= "                <br>    \n"; 
                $rep.= "                <div class=\"col-sm-5 grey\">\n";                
                $rep.= "                        <p>$ ".$ligne->prix." pour 100 grammes</p>"; 
                $rep.= "                    </div>"; 
                $rep.= "                <div class=\"col-sm-3\">";                
                $rep.= '                        <p class="client">Quantité: <select id="quantite" name="quantite" ><option value="1">1</option><option value="2">2</option><option value="3">3</option></select></p>'; 
                $rep.= "                    </div>"; 
                $rep.= "                    <div class=\"col-sm-4\">";                
                $rep.= '                        <p class="client"><button type="submit" class="btn-success"><i class="fa fa-cart-plus"></i> Ajouter</button></p>'; 
                $rep.= "                    </div>"; 
                $rep.= "            </div>"; 
                $rep.= "            "; 
                $rep.= "       </div></form>";                                                
            }
            mysqli_free_result($listeFilms);                         
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