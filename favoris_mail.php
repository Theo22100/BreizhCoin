<?php

session_start();
if ($_SESSION['rang']!="0") {
	header('Location: login.php');
}

$servername = "localhost";
$username = "root";
$password_db = "root";
$dbname = "cours";

$entete  = 'MIME-Version: 1.0' . "\r\n";
$entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$entete .= 'From: BreizhCoinCoin' . "\r\n";
$entete .= 'Reply-to: ' . $_SESSION['mail'];

$message = ("<h3> Liste des favoris </h3>");


try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password_db);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$id_user = $_SESSION['id'];



	$sql = $conn->prepare("SELECT id,annonce FROM favoris WHERE user = '" . $id_user . "';");



	$sql->execute(array());




	$num_of_rows = $sql->rowCount();


	foreach ($sql as $row) {
		//pour prendre l'id de la annonce
		$donneesannonce = $row['annonce'];
		try {
			//$sql2 = $conn -> prepare("SELECT id,titre,description,prix,lienImage FROM annonce WHERE id = '".$donneesannonce."';");
			$annonce = $conn->query("SELECT * FROM annonce WHERE id = '" . $donneesannonce . "';")->fetch();





			$message .= ("<h5>" . $annonce['titre'] . "</h5>");
			$message .= ("<img src='images/" . $annonce['lienImage'] . "' alt='" . $annonce['titre'] . "' width='auto' height='100px'/>");
			$message .= ("<p>" . $annonce['description'] . "</p>");
			$message .= ("<p> Prix : " . $annonce['prix'] . " € </p>");
			$message .= ("<p> Lien : http://localhost/Projet/annonce.php?id=" . $annonce['id'] . " </p>");
			$message .= ("<br/>");
		} catch (PDOException $e) {
			echo 'Echec Connexion 1 : ' . $e->getMessage();
		}
	}
} catch (PDOException $e) {
	echo 'Echec Connexion 2 : ' . $e->getMessage();
}

$retour = mail($_SESSION['mail'], 'Envoi depuis page Favoris', $message, $entete);
if ($retour) {
	header("Location: http://localhost/Projet/favoris.php?message=mailreussi");
} else {
	header("Location: http://localhost/Projet/favoris.php?message=mailechoue");
}
?>
