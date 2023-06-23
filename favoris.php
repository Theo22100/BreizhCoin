<?php
include("inc/top.php");
session_start();
if ($_SESSION['rang']!="0") {
	header('Location: login.php');
}
?>


<!-- debut de la partie contenu -->
<div class="main">
	<div class="ser-main">
		<h4>Vos favoris</h4>
		<div class="ser-para">
			<p>Voici la liste de vos annonces favorites ! </p>
			<?php
			if ($_GET["message"] == "echoue") {
				echo '<p style="color:red;">L\'annonce n\'a pas pu être ajouté dans vos favoris !</p>';
			} else if ($_GET["message"] == "reussi") {
				echo '<p style="color:green;">L\'annonce a été ajouté dans vos favoris !</p>';
			} else if ($_GET["message"] == "supreussie") {
				echo '<p style="color:green;">L\'annonce a été supprimé de vos favoris !</p>';
			} else if ($_GET["message"] == "supechoue") {
				echo '<p style="color:red;">L\'annonce n\'a pas été supprimé de vos favoris !</p>';
			} else if ($_GET["message"] == "mailechoue") {
				echo '<p style="color:red;">Le mail n\'a pas pu être envoyé (Erreur ou Serveur local) !</p>';
			} else if ($_GET["message"] == "mailreussi") {
				echo '<p style="color:green;">Le mail a été envoyé !</p>';
			}
			?>
		</div>

		<!-- debut de  ligne de 3 produits -->



		<?php
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

			foreach ($sql as $row) {
				//pour prendre l'id de la annonce
				$donneesannonce = $row['annonce'];
				try {
					//$sql2 = $conn -> prepare("SELECT id,titre,description,prix,lienImage FROM annonce WHERE id = '".$donneesannonce."';");
					$annonce = $conn->query("SELECT * FROM annonce WHERE id = '" . $donneesannonce . "';")->fetch();

					echo ("<div class='ser-grid-list'>");
					echo ("<h5>" . $annonce['titre'] . "</h5>");
					echo ("<img src='images/" . $annonce['lienImage'] . "' alt='" . $annonce['titre'] . "' width='auto' height='100px'/>");
					echo ("<p>" . $annonce['description'] . "</p>");
					echo ("<div class='btn top'><a href='favoris_supprimer.php?idfav=" . $annonce['id'] . "'>Supprimer de mes favoris</a></div>");
					echo ("</div>");
				} catch (PDOException $e) {
					echo 'Echec Connexion : ' . $e->getMessage();
				}
			}
		} catch (PDOException $e) {
			echo 'Echec Connexion : ' . $e->getMessage();
		}

		?>

		<div class="clear"></div>

		<div class="clear">
			<div class="btn top"><a href="favoris_imprimer.php" target="_blank">Imprimer mes favoris</a></div>
		</div>
		<div class="clear">
			<div class="btn top"><a href="favoris_mail.php">Envoyer mes favoris par Mail</a></div>
		</div>
	</div>

	<?php
	include("inc/categories.php");
	?>
	<div class="clear"></div>
</div>
<!-- fin de la partie contenu -->
<?php
include("inc/bottom.php");
?>