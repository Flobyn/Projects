<!-- includes -->
<?php
include 'connect.php';
?>
<html>
<body>

<?php 	//de values zorgen dat die ook ingevuld worden
    $values = [];
    if( isset($_POST['bestellingID']))
        $values['bestellingID'] = $_POST['bestellingID'];
    if( isset($_POST['betaald']))
        $values['betaald'] = $_POST['betaald'];
        
    if( count($values) !=2) {
        die('niet alles is ingevuld');    
    }  
        // of alles klopt en overeenkomt
    $sql = 'UPDATE bestelling SET 
            betaald = :betaald
            WHERE bestellingID = :bestellingID';
        
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