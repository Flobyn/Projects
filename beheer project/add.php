<!-- includes -->
<?php
include 'connect.php';
?>
<html>
<body>

<?php
	//of alles is ingevuld en dat het naar de juiste toe word gevoegd
$values = [];
if( isset($_POST['producent']))
	$values['producent'] = $_POST['producent'];
if( isset($_POST['naam']))
	$values['naam'] = $_POST['naam'];
if( isset($_POST['land']))
	$values['land'] = $_POST['land'];
if( isset($_POST['prijs']))
	$values['prijs'] = $_POST['prijs'];
if( isset($_POST['voorraad']))
	$values['voorraad'] = $_POST['voorraad'];

if( count($values) !=5) {
	die('niet alles is ingevuld');	
}	

$sql = 'INSERT INTO product (producent, naam, land, prijs, voorraad)
VALUES (:producent, :naam, :land, :prijs, :voorraad)';

$stmt = $pdo->prepare($sql);
	// checken of het is toegevoegd of mis is gegaan
if($stmt->execute($values)) {
	echo'<p>toegevoegd</p>';
}else{
	echo '<p> oepse floepse</p>';
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
