<!-- includes -->
<?php
include 'connect.php';	
 ?>
<html>
<body>

	<div class="header">
		<h1> Beheerpagina </h1>
	</div>	

	<ul>
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
	</ul>

	<h2>Product toevoegen</h2>
	<!-- om een product toe te voegen -->
	<form method="POST" action="./add.php">
	
		<p><label>Producenten</label><br>
		<input type="text" name="producent" value="" placeholder="producent" maxlength="100" required></p><p>
		<label>Naam</label><br>
		<input type="text" name="naam" value="" placeholder="naam" maxlength="100" required></p><p>
		<label>Land</label><br>
		<input type="text" name="land" value="" placeholder="land" maxlength="2" required></p><p>
		<label>Prijs</label><br>
		<input type="text" name="prijs" value="" placeholder="prijs" required></p><p>
		<label>Voorraad</label><br>
		<input type="number" name="voorraad" value="" maxlength="10" placeholder="voorraad" required></p>
		<p><input type="submit" value="Toevoegen"></p>
	
	</form>

</body>
</html>