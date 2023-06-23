<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>

<html>

<head>
	<title>BreizhCoinCoin</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href='//fonts.googleapis.com/css?family=Cabin+Condensed' rel='stylesheet' type='text/css'>
</head>

<body>
	<div class="wrap">
		<div class="header">
			<div class="logo">
				<a href="index.php"><img src="images/logo.png" alt=""> </a>
			</div>
			<div class="header-right">
				<?php
				if (isset($_SESSION['rang']) && $_SESSION['rang']=='0') {
					echo ('<div class="contact-info">');
					echo ('<ul>');
					echo ('<li><a href="favoris.php">Favoris : ');



					$servername = "localhost";
					$username = "root";
					$password_db = "root";
					$dbname = "cours";


					try {
						$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password_db);
						$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$id_user = $_SESSION['id'];



						$sql = $conn->prepare("SELECT id,annonce FROM favoris WHERE user = '" . $id_user . "';");



						$sql->execute(array());




						$num_of_rows = $sql->rowCount();
						echo $num_of_rows;
					} catch (PDOException $e) {
						echo 'Echec Connexion : ' . $e->getMessage();
					}








					echo (' enregistrés</a></li>');

					echo ('</ul>');
					echo ('</div>');
				}
				?>
				<div class="menu">
					<ul class="nav">
						<li class="active"><a href="index.php" title="Home">Accueil</a></li>
						<li><a href="apropos.php">Notre concept</a></li>
						<li><a href="categories.php">Annonces</a></li>
						<li><a href="contact.php">Contact</a></li>
						<?php
						if (isset($_SESSION['rang']) && $_SESSION['rang']!="0") {
							echo ("<li><a href='sinscrire.php'>S'enregistrer</a></li>");
							echo ("<li><a href='login.php'>Se connecter</a></li>");
						} else {
							echo ('<li><a href="deconnexion.php">Se déconnecter</a></li>');
							echo ('<li><a href="compte.php">Mon compte</a></li>');
						}
						?>
						<div class="clear"></div>
					</ul>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="hdr-btm pad-w3l">
			<div class="hdr-btm-bg"></div>
			<div class="hdr-btm-left">
				<div class="search">
					<form method="POST" action="categories.php">
						<input type="text" placeholder="Tapez votre recherche" name="titre">
						<input type="submit" value="Chercher" class="pad-w3l-search">
					
				</div>
				<div class="drp-dwn">
					<select class="custom-select" id="select-1" name="categorie">


						<option selected="selected">Catégorie</option>


						<?php



						$serveur = "localhost";
						$login = "root";
						$pass = "root";


						try {
							$connexion = new PDO("mysql:host=$serveur;dbname=cours", $login, $pass);
							$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$requete1 =  "SELECT id,nom FROM categorie;";



							foreach ($connexion->query($requete1) as $row) {
								echo ("<option value=" . $row['id'] . ">" . $row['nom'] . "</option>");
							}
						} catch (PDOException $e) {
							echo 'Echec Connexion 2 : ' . $e->getMessage();
						}



						?>
					</select>
				</div>
				</form>
				<div class="txt-right">
					<h3><a href="rechercheav.php">Recherche avancée</a></h3>
				</div>
				<div class="clear"></div>
			</div>
		</div>