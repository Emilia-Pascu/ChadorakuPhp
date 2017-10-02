<?php
    session_start(); 
    require_once("../BD/connexion.inc.php");
    require '../layout/headerAdmin.php';
?>   
    <div class="container">
        <div class="row">
            <h3 class="tpad">Sélection de thé</h3>
        </div>
        <div class="row">
            <p>
                <a href="ajouterThe.html" class="btn btn-success">Ajouter</a>
            </p>
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Nom</th>
                        <th>Categorie</th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th>Gestion</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="../images/matcha.jpg" width="40"></td>
                        <td>Matcha</td>
                        <td>Thé vert</td>
                        <td>Très bon thé</td>
                        <td>10.25 $</td>
                        <td>
                            <a class="btn btn-success" href="modifierThe.html">Modifier</a>
                            <a class="btn btn-danger" href="supprimerThe.html">Supprimer</a>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="../images/sencha.jpg" width="40"></td>
                        <td>Matcha</td>
                        <td>Thé vert</td>
                        <td>Très bon thé</td>
                        <td>10.25 $</td>
                        <td>
                            <a class="btn btn-success" href="modifierThe.html">Modifier</a>
                            <a class="btn btn-danger" href="supprimerThe.html">Supprimer</a>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="../images/gyokuro.jpg" width="40"></td>
                        <td>Matcha</td>
                        <td>Thé vert</td>
                        <td>Très bon thé</td>
                        <td>10.25 $</td>
                        <td>
                            <a class="btn btn-success" href="modifierThe.html">Modifier</a>
                            <a class="btn btn-danger" href="supprimerThe.html">Supprimer</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>