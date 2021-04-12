<!-- includes -->
<?php
session_start();
include 'connect.php';	
 ?>
<html>
<body>
	<div class="header">
		<h1> Beheerpagina </h1>
	</div>	
	
	<ul>	<!-- navbar -->
<?php
	if(isset($_SESSION["valid"]) && $_SESSION["valid"] === true){
		echo '<li><a href="bestellingen.php">Besteling overzicht</a></li>';
		echo '<li><a href="invul.php">Product toevoegen</a></li>'; 
		echo '<li><a href="producten.php">Producten overzicht</a></li>'; 
		echo '<li><a href="logout.php">Beheer logout</a></li>';

	} else {
		echo '<li><a href="login.php">Beheer inlog</a></li>';
	}
?>
	</ul>
	
	<h2>Welkom beheerder</h2>
	<p>Als u toegang wilt tot de andere pagina's moet u eerst inloggen</p>
	
	</body>
</html>