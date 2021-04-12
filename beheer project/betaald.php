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
	if( !isset( $_GET['bestellingID'])){
		die('er is niks meegegeven');
	}
	
	$bestellingID = $_GET['bestellingID'];
	
	$sql = 'SELECT * FROM bestelling WHERE bestellingID = :bestellingID';
	$stmt = $pdo->prepare($sql);
	
	$stmt->execute([$bestellingID]);
	
	$product = $stmt->fetch();
?>

	<h2>wijzigen</h2> <!--dat de informatie die aangepast moet worden er al in staat -->
	<form method="POST" action="betaald2.php">
		<input type="hidden" name="bestellingID" value="<?= $product['bestellingID']?>">
		<p><label>Betaal status (1 = betaald 0 = niet betaald)</label><br>
		<input type="text" name="betaald" value="<?= $product['betaald']?>" placeholder="betaald"></p><p>
		<p><input type="submit" value="opslaan"></p>
	</form>

</body>
</html>