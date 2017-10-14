<?php
session_start();
require_once("../BD/connexion.inc.php");
require '../layout/headerSimple.php';

global $connexion;
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantite"])) {
            $nom = $_GET["nom"];
            
            $requete="SELECT * FROM produit WHERE nom=?";
                    $stmt = $connexion->prepare($requete);
                    $stmt->bind_param("s", $nom);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while($ligne = mysqli_fetch_assoc($result)){
                        $productByCode[] = $ligne;
                        $stmt->close();
                    }
			
			$itemArray = array($productByCode[0]["nom"]=>array('idProduit'=>$productByCode[0]["idProduit"], 'nom'=>$productByCode[0]["nom"], 'image'=>$productByCode[0]["image"], 'quantite'=>$_POST["quantite"], 'prix'=>$productByCode[0]["prix"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["nom"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["nom"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantite"])) {
									$_SESSION["cart_item"][$k]["quantite"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantite"] += $_POST["quantite"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["nom"] == $k)
						unset($_SESSION["cart_item"][$k]);
					 
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
@mysqli_close($connexion); 
 

?>


	<div class="container" id="formLogin">
        <div class="jumbotron" id="jumbo">
			
			<div>
				
					<div class="row" id="entete-panier">
							<div class="col-sm-6 active" id="titre-panier">
								<h2> Votre Panier</h2> 
							</div>
								<div class="col-sm-6 text-right">
									
									<a class="btn btn-danger vcenter" id="btnEmpty" href="panier.php?action=empty">Vider le panier</a>
								</div>	
					</div>


<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
?>	
<table class='table table-striped'>
<tbody>
<tr>
<th><strong>Image</strong></th>
<th><strong>Nom thé</strong></th>
<th><strong>Quantité</strong></th>
<th><strong>Prix</strong></th>
<th><strong></strong></th>
</tr>	
<?php	
$dossier="../pochette/";	
    foreach ($_SESSION["cart_item"] as $item){
		?>
				<tr>                
				<td><img src="<?php echo $dossier.$item["image"]; ?>" width='40'></td>
				<td><?php echo $item["nom"]; ?></td>
				<td><?php echo $item["quantite"]; ?></td>
				<td><?php echo "$".$item["prix"]; ?></td>
				<!--<td><a href="panier.php?action=remove&titre=<?php echo $item["titre"]; ?>" class="btnRemoveAction">Enlever du panier</a></td>-->
				<td><a class="btn btn-danger btnRemoveAction" href="panier.php?action=remove&nom=<?php echo $item["nom"]; ?>">Supprimer</a></td>
				</tr>
				<?php
        $item_total += ($item["prix"]*$item["quantite"]);
		$tvq = 0.07;
		$tps = 0.05;
		$item_tvq = round($item_total*$tvq,2);
		$item_tps = round($item_total*$tps,2);
		$item_total_taxe = ($item_total + $item_tps + $item_tvq);
		}
		?>

</tbody>
</table>
<div class="row">
	<div class="col-sm-12 text-right">
		<strong>Sous-total:</strong> <?php echo "$".$item_total; ?>
	</div>
	<div class="col-sm-12 text-right">
		<strong>TVQ:</strong> <?php echo "$".$item_tvq; ?>
	</div>
	<div class="col-sm-12 text-right">
		<strong>TPS:</strong> <?php echo "$".$item_tps; ?>
	</div>
	<div class="col-sm-12 text-right">
		<strong>Total:</strong> <?php echo "$".$item_total_taxe; ?>
	</div>
		
</div>

  <?php
}
?>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <a class="btn btn-success form-control" id="btn-continuer" href="../index.php">Continuer les achats</a>
        </div>
    </div>
</div>
</div>
</div>		
</BODY>
</HTML>