<!-- includes -->
<?php 
	include 'connect.php';
?>
<html>
<body>

	<div class="header">
		<h1> Beheerpagina </h1>
	</div>	
	
<?php
	// info van de geselecteerde opvragen
	if( !isset( $_GET['productID'])){
		die('er is niks meegegeven');
	}
	
	$productID = $_GET['productID'];
	
	$sql = 'SELECT * FROM product WHERE productID = :productID';
	$stmt = $pdo->prepare($sql);
	
	$stmt->execute([$productID]);
	
	$product = $stmt->fetch();
?>

	<h2>wijzigen</h2> <!--dat de informatie die aangepast moet worden er al in staat -->
	<form method="POST" action="update2.php">
		
		<input type="hidden" name="productID" value="<?= $product['productID']?>">
		<p><label>Producenten</label><br>
		<input type="text" name="producent" value="<?= $product['producent']?>" placeholder="producent"></p><p>
		<label>Naam</label><br>
		<input type="text" name="naam" value="<?= $product['naam']?>" placeholder="naam"></p><p>
		<label>Land</label><br>
		<input type="text" name="land" value="<?= $product['land']?>" placeholder="land"></p><p>
		<label>Prijs</label><br>
		<input type="text" name="prijs" value="<?= $product['prijs']?>" placeholder="prijs"></p><p>
		<label>Voorraad</label><br>
		<input type="text" name="voorraad" value="<?= $product['voorraad']?>" placeholder="voorraad"></p><br>
		<p><input type="submit" value="opslaan"></p>
	</form>

</body>
</html>