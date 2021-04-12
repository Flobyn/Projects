<!-- includes -->
<?php
	include 'connect.php';	
 ?>
<html>
<body>
	<div class="header">
		<h1> Beheerpagina </h1>
	</div>	

	<ul><!--links naar andere paginas-->
<?php
	if(isset($_SESSION["valid"]) && $_SESSION["valid"] === true){
		echo '<li><a href="invul.php">Product toevoegen</a></li>'; 
		echo '<li><a href="producten.php">Producten overzicht</a></li>'; 
		echo '<li><a href="bestellingen.php">Besteling overzicht</a></li>';
		echo '<li><a href="logout.php">Beheer logout</a></li>';
	} else {
		echo '<li><a href="login.php">Beheer inlog</a></li>';
	}
?>
	</ul><br>

		<h2>Bestellingen overzicht</h2>
<?php	// op welke volgorde ik het wil en alle info krijgen
	$sql = 'SELECT bes.bestellingID, bes.verzendwijze, bes.datum, bes.betaald, kla.naam, kla.adres, kla.postcode, kla.email, pro.naam AS pronaam, reg.aantal, pro.prijs 
			FROM bestelling AS bes
			INNER JOIN klant AS kla 
			ON bes.klantID = kla.klantID
			INNER JOIN bestelregel AS reg 
			ON bes.bestellingID = reg.bestellingID
			INNER JOIN product AS pro 
			ON reg.productID = pro.productID
			ORDER BY bestellingID';
	$stmt = $pdo-> prepare($sql);
	$stmt->execute();
		
	$informatie = $stmt ->fetchALL();
		
?>	

	<table id="bestellingen_overzicht">
	<thead>
		<tr>
			<th>verzendwijze</th>
			<th>datum</th>			
			<th>betaald</th>
			<th>naam</th>
			<th>adres</th>
			<th>postcode</th>
			<th>email</th>
			<th>productnaam</th>
			<th>aantal</th>
			<th>prijs (per stuk)</th>
			<th>betaald status wijzigen</th>
		</tr>
	</thead>
	<tbody>
		<?php
		// waar welke info moet
		foreach($informatie as $product){
			echo ' 
				<tr>
					<td>' . $product['verzendwijze'] . '</td>
					<td>' . $product['datum'] . '</td>
					<td>' . $product['betaald'] . '</td>
					<td>' . $product['naam'] . '</td>
					<td>' . $product['adres'] . '</td>
					<td>' . $product['postcode'] . '</td>
					<td>' . $product['email'] . '</td>
					<td>' . $product['pronaam'] . '</td>
					<td>' . $product['aantal'] . '</td>
					<td>' . $product['prijs'] . '</td>
					<td><a href="betaald.php?bestellingID=' . $product['bestellingID'] . '">Wijzig</a></td>
				</tr>
			';
		}
		?>
	</tbody>	
	</table>	
			
</body>
</html>