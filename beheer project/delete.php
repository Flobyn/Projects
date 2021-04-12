<!--includes-->
<?php
include "connect.php";
?>
<html>
<body>

<?php //de info opvragen
	if (!isset( $_GET["productID"])){
		die( "er is geen productID meegegeven");
	}
		//de geselecteerde verwijderen
	$productID = $_GET["productID"];
	$sql = "DELETE FROM product WHERE productID = :productID";
	$stmt = $pdo->prepare( $sql );

	$stmt->execute([$productID]);
		
		//voor of het goed of mis is gegaan
	if($pdo->prepare($sql)) {
		echo'<p>Dit product is verwijderd</p>';
	}else{
		echo '<p>Er is iest mis gegaan probeer later opnieuw</p>';
		}

?>

	<div class="header">
		<h1> Beheerpagina </h1>
	</div>	

	<ul><!--links naar andere paginas-->
		<li><a href='invul.php'>Product toevoegen</a></li>
		<li><a href='producten.php'>Producten overzicht</a></li>
		<li><a href='bestellingen.php'>Besteling overzicht</a></li>
	</ul>
	
</body>
</html>