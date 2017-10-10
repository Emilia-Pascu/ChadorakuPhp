<?php
    session_start(); 
    require_once("BD/connexion.inc.php");
    require 'layout/headerClient.php';    
?>
    <div id="myCarousel" class="carousel slide" data-interval="2000">
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
                        <h1>LES THÉS DU JAPON</h1>                        
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="images/Hiroshige16_kanbara.jpg">
                <div class="container active">
                    <div class="carousel-caption">
                        <h1>UNE TRADITION MILLÉNAIRE</h1>                        
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="images/Kajikazawa_in_Kai_province.jpg">
                <div class="container active">
                    <div class="carousel-caption">
                        <h1>DISPONIBLE AU BOUT DES DOIGTS</h1>                       
                    </div>
                </div>
            </div>
        </div>       
    </div>
   
    <div class="intro-block">
        <div class="container">
            <div class="row">
                <div class="col-xs-3">
                    <img class="img-responsive tpad" src="images/logo.png">
                </div>
                <div class="col-xs-9">
                    <h1 class="text-muted">CHA DO RAKU <span class="text-muted"> votre maître des thés</span></h1>
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
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
                <img class="img-circle img-responsive" src="images/matcha.jpg">
                <h3>Matcha</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <p><a class="btn btn-default" href="#">Voir la sélection &raquo;</a></p>
            </div>
            <div class="col-sm-6 col-md-3">
                <img class="img-circle img-responsive" src="images/sencha.jpg">
                <h3>Sencha</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <p><a class="btn btn-default" href="#">Voir la sélection &raquo;</a></p>
            </div>
            <div class="clearfix hidden-md hidden-lg"></div>
            <div class="col-sm-6 col-md-3">
                <img class="img-circle img-responsive" src="images/gyokuro.jpg">
                <h3>Gyokuro</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <p><a class="btn btn-default" href="#">Voir la sélection &raquo;</a></p>
            </div>
            <div class="col-sm-6 col-md-3">
                <img class="img-circle img-responsive" src="images/hojicha.jpg">
                <h3>Hojicha</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <p><a class="btn btn-default" href="#">Voir la sélection &raquo;</a></p>
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
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <h3 class="tpad">ATELIERS DE DÉGUSTATION</h3>
                    <hr>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <p><a class="btn btn-large btn-primary" href="#">Voir les détails</a></p>
                    <h3 class="tpad">PARLEZ, ON VOUS ÉCOUTE</h3>
                    <hr>
                    <div class="col-sm-6 form-group">
                        <label for="name">Nom</label>
                        <input class="form-control" id="name" name="name" placeholder="" type="text" required>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="email">Courriel</label>
                        <input class="form-control" id="email" name="email" placeholder="" type="email" required>
                    </div>
                    <div class="col-sm-12 form-group">
                        <label for="comments">Commentaires</label>
                        <textarea class="form-control" id="comments" name="comments" placeholder="" rows="5"></textarea><br>
                    </div>

                    <div class="col-sm-12 form-group">
                        <button class="btn btn-large btn-primary" type="submit">Envoyer</button>
                    </div>
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
                    750 Bienville<br>
                   Montréal, QC<br>
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
    <script src="js/jquery.js"></script>   
    <script src="js/bootstrap.min.js"></script>
    <script>
        $(function() {
            $('.carousel').carousel({
                interval: 4000
            });
        })
        verifierSess();
    </script>
</body>
</html>