<?php 
include_once 'connect.php';

//formulier afhandelen
$errors =[];
if( isset($_POST) && count($_POST) > 0){

	$naam = filter_input (INPUT_POST, 'naam', FILTER_SANITIZE_STRING);
	if( !$naam || $naam == '')
		$errors['naam'] = 'Er is geen naam ingevuld';
	$adres = filter_input (INPUT_POST, 'adres', FILTER_SANITIZE_STRING);
	if( !$adres || $adres == '')
		$errors['adres'] = 'Er is geen adres ingevuld'; 
	$postcode = filter_input (INPUT_POST, 'postcode', FILTER_SANITIZE_STRING);
	if( !$postcode || $postcode == '')
		$errors['postcode'] = 'Er is geen postcode ingevuld';
	$woonplaats = filter_input (INPUT_POST, 'woonplaats', FILTER_SANITIZE_STRING);
	if( !$woonplaats || $woonplaats == '')
		$errors['woonplaats'] = 'Er is geen woonplaats ingevuld';
	$email = filter_input (INPUT_POST, 'email', FILTER_SANITIZE_STRING);
	if( !$email || $email == '')
		$errors['email'] = 'Er is geen email ingevuld';
	
	$nieuwsbrief = ($_POST['nieuwsbrief'] == 'y' ? 1 : 0);
	
	if(count ($errors) == 0){
		
			$values = ['naam' => $naam, 'adres' => $adres, 'postcode' => $postcode, 'woonplaats' => $woonplaats, 'email' => $email, 'nieuwsbrief' => $nieuwsbrief];

			$sql = 'INSERT INTO klant VALUES (null, :naam, :adres, :postcode, :woonplaats, :email, :nieuwsbrief)';
			$stmt = $pdo->prepare($sql);

			if($stmt->execute($values)){
				// klant opgeslagen
				
				//klantid
				$klantID = $pdo->lastInsertId();
				
				//bestelling in tabel
				$verzendwijze = ($_POST['verzendwijze'] == 'post' ? 'post' : 'afhalen' );  
				
				$values = ['klantID' => $klantID, 'verzendwijze' => $verzendwijze];
				
				$sql = 'INSERT INTO bestelling (klantID, datum, verzendwijze) VALUES (:klantID, CURRENT_TIMESTAMP(), :verzendwijze )';
				$stmt =$pdo->prepare($sql);
				
				if($stmt->execute($values)){
					//bestelling opgeslagen
					$bestellingID = $pdo->lastInsertId();
					
					$sql = 'INSERT INTO bestelregel (bestellingID, productID, aantal, prijs) VALUES( :bestellingID, :productID, :aantal, :prijs)';
					$stmt = $pdo->prepare($sql);
					
					$items = $_POST['item'];
					foreach($items as $productID => $item){
						$aantal = $item['aantal'];
						$prijs = $item['prijs'];
						
						if( $aantal > 0) {
							$values = ['bestellingID' => $bestellingID, 'productID' => $productID, 'aantal' => $aantal, 'prijs' => $prijs];
							$stmt->execute($values);
						}
					}
				}
				else { $errors[] = "opslaan ging mis bestelling";		}
			} 
				else { $errors[] = "opslaan ging mis gegevens klant"; 	}
	}
}



// om gegevens in het formulier bestellen te hebben
$sql = '
	SELECT p.*, c.naam AS categorie
	FROM product AS p 
	LEFT JOIN categorie AS c ON c.categoryID = p.categoryID
	';
	$stmt = $pdo-> prepare($sql);
	$stmt->execute();
		
	$producten = $stmt ->fetchALL();

	$producten_per_categorie = [];
	foreach($producten as $product){
	$producten_per_categorie[$product['categorie']] [] = $product;
	}
preprint_r($producten_per_catergorie);
?>

<html>
<body>
	<div class="header">
	<h1>Welkom bij Slijterij Stuk in m'n Kraag</h1>
	<h2> plaats hier je bestelling</h2>
	</div>
	 <?php 
	if (isset ($errors) && count($errors) > 0){
		echo 'het volgende is fout gegaan';
		echo "<ul>";
		foreach($errors as $err){
			echo'<li>' . $err . '</li>';
		}
		echo "</ul>";
	}
	?>
	
	<form method="POST" action="bestel.php">
	<?php
		// naam en aantal wat boven de producten staat
		foreach( $producten_per_categorie as $categorie => $producten){
			echo '
				
				<legend>' . $categorie . '</legend>
				<p>
					<span class="product"><h3>Product keuze</h3></span>
					
				</p>
				';
			// producten weergeven
			foreach($producten as $product) {
				echo '
				<p>
					<span class="product">' . $product['naam'] . '<small> €' . $product['prijs'] . '</small></span><br>
					<span class="qty"><input type="text" name="item[' . $product['productID'] . '][aantal]" placeholder="aantal"><input type="hidden" name="item[' . $product['productID'] . '][prijs]" value"' . $product['prijs'] .'"></span>
				</p>
				';
			}
			echo '
			
			';
		}
		?>
	
<h3>registratie formulier</h3>	
<!-- registreer formulier -->
	
		<input type="text" id="naam" name="naam" value="<?= $naam ?>" placeholder="naam*"><br>
		<input type="text" id="adres" name="adres" placeholder="Adres*"><br>
		<input type="text" id="postcode" name="postcode" class="postcode" placeholder="Postcode*"><br>
		<input type="text" id="woonplaats" name="woonplaats" placeholder="Woonplaats*"><br>
		<input type="email" id="email" name="email" value="<?= $email ?>" placeholder="E-mail*" ><br>
		
	<div class="item">
	<input type="checkbox" id="ja" name="ja" value="y">
		<label for="ja">Ja, stuur mij nieuws en aanbiedingen!</label>
		</div>
		
	<p style="font-weight: bold;">Verzendwijze<br></p>
	<input type="radio" id="post" name="keuze" value="post"><br>
  		<label for="post">Per post</label><br>
 	<input type="radio" id="afhalen" name="keuze" value="afhalen"><br>
		<label for="afhalen" >Afhalen</label><br>	

	<input type="submit" value="Bestelling plaatsen!">
	
</form>
	
</body>
</html>