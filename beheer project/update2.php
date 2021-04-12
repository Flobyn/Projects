<!-- includes -->
<?php
include 'connect.php';
?>
<html>
<body>

<?php 	//de values zorgen dat die ook ingevuld worden
    $values = [];
    if( isset($_POST['productID']))
        $values['productID'] = $_POST['productID'];
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

    if( count($values) !=6) {
        die('niet alles is ingevuld');    
    }  
        // of alles klopt en overeenkomt
    $sql = 'UPDATE product SET 
            producent = :producent, naam = :naam, land = :land, prijs = :prijs, voorraad = :voorraad
            WHERE productID = :productID';
        
        
    $stmt = $pdo->prepare($sql);
        
        // of het aangepast of mis is gegaan
    if($stmt->execute($values)) {
        echo'<p>bijgewerkt</p>';
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