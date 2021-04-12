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

		<h2>Overzicht producten</h2>

<?php	// op welke volgorde ik het wil en alle info krijgen
	$sql = 'SELECT * FROM product ORDER BY producent';
	$stmt = $pdo-> prepare($sql);
	$stmt->execute();
		
	$producten = $stmt ->fetchALL();
?>	
	<table id="overzicht">
	<thead>
		<tr>
			<th>producent</th>
			<th>naam</th>			
			<th>land</th>
			<th>prijs</th>
			<th>voorraad</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php
			// waar de opgrvaarde info moet
		foreach($producten as $product){
			echo ' 
				<tr>
					<td>' . $product['producent'] . '</td>
					<td>' . $product['naam'] . '</td>
					<td>' . $product['land'] . '</td>
					<td>' . $product['prijs'] . '</td>
					<td>' . $product['voorraad'] . '</td>
					<td><a href="update.php?productID=' . $product['productID'] . '">Wijzig</a></td>
					<td><a href="delete.php?productID=' . $product['productID'] . '">Verwijder</a></td>
				</tr>
			';
		}
?>
	</tbody>	
	</table>	
			
</body>
</html>