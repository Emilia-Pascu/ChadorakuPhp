<?php
    session_start(); 
    require_once("BD/connexion.inc.php");
    require 'layout/headerClient.php';

    global $connexion;    
    $nom = $courriel = $description = $message = "";
    $isValid = true;

    if ( !empty($_POST)) {  
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
        if (empty($_POST["description"])) {
                        $message .= "Le commentaire est requis<br/>";
                        $isValid = false;
                    } else {
                        $description = test_input($_POST["description"]);                          
                    }
	    if($isValid){
            $requete="INSERT INTO commentaire values(0,?,?,?)";
            $stmt = $connexion->prepare($requete);
            $stmt->bind_param("sss", $nom,$courriel,$description);
            $stmt->execute();
            $message = "Votre message a été bien envoyé.";
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
    <!--<div id="myCarousel" class="carousel slide" data-interval="2000">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active">
                <img src="images/Hiroshige11_hakone.jpg">
                <div class="container active">
                    <div class="carousel-caption">
                        <h3>LES THÉS DU JAPON</h3>                        
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="images/Hiroshige16_kanbara.jpg">
                <div class="container active">
                    <div class="carousel-caption">
                        <h3>UNE TRADITION MILLÉNAIRE</h3>                        
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="images/Kajikazawa_in_Kai_province.jpg">
                <div class="container active">
                    <div class="carousel-caption">
                        <h3>DISPONIBLE AU BOUT DES DOIGTS</h3>                       
                    </div>
                </div>
            </div>
        </div>       
    </div>-->

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="images/Hiroshige11_hakone.jpg" alt="Hakone">
        <div class="carousel-caption">
          <h1>LES THÉS DU JAPON</h1>
          <!--<p>The atmosphere in New York is lorem ipsum.</p>-->
        </div>      
      </div>

      <div class="item">
        <img src="images/The_Great_Wave_off_Kanagawa.jpg" alt="Kanbara" width="1200" height="700">
        <div class="carousel-caption">
          <h1>UNE TRADITION MILLÉNAIRE</h1>
          
        </div>      
      </div>
    
      <div class="item">
        <img src="images/Kajikazawa_in_Kai_province.jpg" alt="Kajikazawa" width="1200" height="700">
        <div class="carousel-caption">
          <h1>DISPONIBLE AU BOUT DES DOIGTS</h3>   
        </div>      
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
    <!--Carousel End -->
    <div class="intro-block">
        <div class="container">
            <div class="row">
                <!--<div class="col-xs-3">
                    <img class="img-responsive tpad" src="images/logo.png">
                </div>-->
                <div class="col-xs-12">
                    <h1 class="text-muted">CHA DO RAKU</h1>
                    <h2 class="text-muted">votre maître des thés</h2>
                    <p class="lead" id="presentation">Chaque année, nous parcourons le Japon à la rencontre des meilleurs producteurs. Aprés une sélection rigoureuse, nous vous présentons les thés les plus fins et les plus traditionnels. Bonne dégustation! </p>
                </div>
            </div>
        </div>
    </div>  
    <div class="container padded">
        <div class="row">
            <div class="col-lg-12">
                <h2>Nos catégories de thés</h2>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-3">
               <a href="php/listeProduits.php?categorie='Matcha'"> <img class="img-circle img-responsive" src="images/matcha.jpg" > </a>
                <h3>Matcha</h3>
                <p>Le matcha est une poudre très fine de thé vert moulu, qui a été broyée entre deux meules en pierre. Il est utilisé pour la cérémonie du thé japonaise et comme colorant ou arôme naturel avec des aliments tels que le mochi, les soba, la crème glacée au thé vert.</p>
                <p><a class="btn btn-default" href="php/listeProduits.php?categorie='Matcha'">Voir la sélection &raquo;</a></p>
            </div>
            <div class="col-sm-6 col-md-3">
                <a href="php/listeProduits.php?categorie='Sencha'"> <img class="img-circle img-responsive" src="images/sencha.jpg"></a>
                <h3>Sencha</h3>
                <p>Le sencha est un thé vert dont le nom signifie littéralement « thé infusé ». Il est le thé le plus courant au Japon. Son processus de fabrication repose sur un arrêt de l'oxydation dans un bain à la vapeur . Puis les feuilles sont roulées et séchées.</p>
                
                <p><a class="btn btn-default" href="php/listeProduits.php?categorie='Sencha'">Voir la sélection &raquo;</a></p>
            </div>
            <div class="clearfix hidden-md hidden-lg"></div>
            <div class="col-sm-6 col-md-3">
                <a href="php/listeProduits.php?categorie='Gyokuro'"> <img class="img-circle img-responsive" src="images/gyokuro.jpg"></a>
                <h3>Gyokuro</h3>
                <p>Le gyokuro est un thé vert de haute qualité, très estimé au Japon. Il est riche en théanine et pauvre en tanins, ce qui lui confère un goût très doux et umami. Sa force en caféine en fait un substitut du café. C'est un thé d'ombre, 2-3 semaines à 90 % d'ombrage.</p>
                <p><a class="btn btn-default" href="php/listeProduits.php?categorie='Gyokuro'">Voir la sélection &raquo;</a></p>
            </div>
            <div class="col-sm-6 col-md-3">
                <a href="php/listeProduits.php?categorie='Hojicha'"> <img class="img-circle img-responsive" src="images/hojicha.jpg"></a>
                <h3>Hojicha</h3>
                <p>Ce thé torréfié a des saveurs boisées et torréfiées qui évoquent ainsi le café, mêlées aux notes iodées propres aux thés japonais. Sa liqueur a également des saveurs caramels. Son infusion a une couleur bronze, tendant parfois vers le brun doré.</p>

                <p><a class="btn btn-default" href="php/listeProduits.php?categorie='Hojicha'">Voir la sélection &raquo;</a></p>
            </div>
        </div>
    </div>   
    <div class="marketing">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <img class="img-responsive" src="images/800px_Geisha.jpg">
                </div>
                <div class="col-sm-6">
                    <h3 class="tpad">SALON DE THÉ</h3>
                    <hr>
                    <p>Dans un décor typiquement japonais, venez déguster nos thés et découvrir nos plats traditionnels. 
                        Notre service, vous accompagne à chaque étape de votre découverte pour vous permettre 
                        dans appécier toutes les facettes.</p>
                    
                    <h3 class="tpad">ATELIERS DE DÉGUSTATION</h3>
                    <hr>
                    <p>Quel meilleur moyen de découvrir le monde fascinant des thés du Japon que d'être enseigné par un maître du thé. 
                        Dans une ambiance décontractée, partagez vos impressions avec d'autres curieux qui désirent approfondir leur amour du thé.</p>
                    
                    <!-- <p><a class="btn btn-large btn-primary" href="#">Voir les détails</a></p> -->
                    <h3 class="tpad">PARLEZ, ON VOUS ÉCOUTE</h3>                   
                    <hr>                     
                    <div>
                        <p>Un de nos consultants est à votre disposition pour répondre à toute question du lundi au vendredi, 
                            entre 8h30 et 18h30 </p>
                        <a class="btn btn-large btn-primary" href="php/chat.php">CHAT</a>
                    </div>
                    <hr>  
                    <form id="formCommentaires" action="" enctype="" method="POST" onSubmit="return validerFormCommentaires();">    
                        <div class="row">                 
                            <div class="col-sm-6 form-group">
                                <label for="nom">Nom</label>
                                <input class="form-control" id="nom" name="nom" placeholder="" type="text" required>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="courriel">Courriel</label>
                                <input class="form-control" id="courriel" name="courriel" placeholder="" type="email" required>
                            </div>
                        </div> 
                        <div class="row"> 
                            <div class="col-sm-12 form-group">
                                <label for="description">Commentaires</label>
                                <textarea class="form-control" id="description" name="description" placeholder="" rows="5"></textarea><br>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-sm-12 form-group">
                                <button class="btn btn-large btn-primary" type="submit"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp; ENVOYER</button>
                            </div>
                        </div>
                    </form>
                    <div class="col-sm-12 alert alert-success msg" id="msg"> <?php echo $message;?></div>
                </div>
            </div>
        </div>
    </div> 
   
    <div class="ftr">
        <div class="container">
            <div class="row">
                <footer>
                    <div class="pull-left ft_space">
                    
                    <address>
                    <h3>CHA DO RAKU</h3>
                    <a class="contact-link" data-type="Address" data-where="Contact page" target="_blank" 
                    href="https://www.google.ca/maps/place/Cha+Do+Raku/@45.526198,-73.5854246,16.89z/data=!4m5!3m4!1s0x4cc91bd6b7ac6575:0x14432a36e5aaa078!8m2!3d45.5263957!4d-73.5831665"> 
                    <address itemprop="address" itemscope itemtype="http://schema.org/PostalAddress"> 
                    <span itemprop="streetAddress">750 Bienville</span><br>
                     <span itemprop="addressLocality">Montréal</span>, <span itemprop="addressRegion">QC</span> 
                     </a>
                     <br>
                    <a href="mailto: info@cha-doraku.com">info@cha-doraku.com</a><br>
                    <abbr title="Phone"></abbr>514 849 5983
                    </address>
                    </div>
                    <div class="pull-right ft_space">
                        <!-- <img class="img-responsive" src="images/logo.png"> -->
                    </div>
                </footer>
            </div>
        </div>
    </div>   
   
    <script>
        $(function() {
            $('.carousel').carousel({
                interval: 4000
            });
        })  

        var quantiteTotale = "<?php echo isset($_SESSION["cart_item"]) ? $_SESSION["quantiteAchats"]: ''; ?>";
        var prixTotal = "<?php echo isset($_SESSION["cart_item"]) ? $_SESSION["valeurAchats"]: ''; ?>";	
        remplirPanier(quantiteTotale, prixTotal);     
    </script>
</body>
</html>