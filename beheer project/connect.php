<!DOCTYPE html>
<html lang="nl">
<head>
	<meta charset="utf-8">
  <title>webshop</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
	session_start();

	function preprint_r( $arr){
		echo"<pre>";
		print_r($arr);
		echo "</pre>";

	}
	//verbindingding
        $host = "localhost:3306";
        $db = "aventus-165681_portfolio";
  		$user = "avent_165681";
  		$pass = 'X9sfkn*l46SgiRmk';
  		$charset = 'utf8mb4';
  
  //connection string en PDO settings
  $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
  $options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
  ];
  
  //verbinding maken met database
  try {
    $pdo = new PDO($dsn, $user, $pass, $options);
  } catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
  }

	

 ?>
	</body>
</html>