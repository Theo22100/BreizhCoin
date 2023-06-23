<?php
include("inc/top.php");
session_start();
?>

<!-- debut de la partie contenu -->

<div class="main">
	<div class="ser-main">
		<h4>Nos annonces</h4>
		<div class="ser-para">
			<p>Liste des annonces </p>
		</div>

		<!-- debut de  ligne de 3 produits -->

		<?php



		$serveur = "localhost";
		$login = "root";
		$pass = "root";
		$connexion = new PDO("mysql:host=$serveur;dbname=cours", $login, $pass);
		$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		
		if (isset($_GET['categorie']) && $_GET['categorie']!="") {
			try {
				$requete2 =  "SELECT * FROM annonce WHERE categorie =" . $_GET['categorie'];
				$nombre = $connexion->prepare($requete2);
				$nombre->execute(array());
				$num_of_rows = $nombre->rowCount();
				
				if ($num_of_rows == 0) {
					echo '<p style="color:red;">Aucun résultat !</p>';
				} else {
					if ($num_of_rows==1){
						echo "<p style='color:green;'>".$num_of_rows." résultat !</p>";
					}else{
						
						echo "<p style='color:green;'>".$num_of_rows." résultats !</p>";
					}
					foreach ($connexion->query($requete2) as $cate) {
						echo ("<div class='ser-grid-list'>");
						echo "<h5>" . $cate['titre'] . "</h5>";
						echo ("<img src='images/" . $cate['lienImage'] . "' alt='" . $cate['titre'] . "' width='auto' height='150px'/>");
						echo "<p>" . $cate['description'] . "</p>";
						echo ("<div class='btn top'><a href='annonce.php?id=" . $cate['id'] . "'>En savoir plus</a></div>");
						echo "</div>";
					}
				}
			} catch (PDOException $e) {
				echo 'Echec Categorie Index : ' . $e->getMessage();
			}
		}


		//Si on recherche sans catégorie ou qu'on clique sur l'ongliet annonce
		if (isset($_POST['categorie']) && ($_POST['categorie'] == "Catégorie" || $_POST['categorie'] == "") && $_POST['titre'] == "" && empty($_GET['categorie'])) {
			try {
				$requete1 =  "SELECT * FROM annonce";

				foreach ($connexion->query($requete1) as $row) {
					echo ("<div class='ser-grid-list'>");
					echo "<h5>" . $row['titre'] .  "</h5>";
					echo ("<img src='images/" . $row['lienImage'] . "' alt='" . $row['titre'] . "' width='auto' height='150px'/>");
					echo "<p>" . $row['description'] . "</p>";
					echo ("<div class='btn top'><a href='annonce.php?id=" . $row['id'] . "'>En savoir plus</a></div>");
					echo "</div>";
				}
			} catch (PDOException $e) {
				echo 'Echec Sans Categorie ou clique onglet : ' . $e->getMessage();
			}




			//ON RECHERCHE AVEC UNE CATEGORIE
		} else if (isset($_POST['categorie']) && $_POST['categorie'] != "Catégorie" && $_POST['titre'] == "" && empty($_GET['categorie'])) {
			try {
				$requete2 =  "SELECT * FROM annonce WHERE categorie =" . $_POST['categorie'];
				$nombre = $connexion->prepare($requete2);
				$nombre->execute(array());
				$num_of_rows = $nombre->rowCount();
				if ($num_of_rows == 0) {
					echo '<p style="color:red;">Aucun résultat !</p>';
				} else {
					if ($num_of_rows==1){
						echo "<p style='color:green;'>".$num_of_rows." résultat !</p>";
					}else{
						echo "<p style='color:green;'>".$num_of_rows." résultats !</p>";
					}
					foreach ($connexion->query($requete2) as $cate) {
						echo ("<div class='ser-grid-list'>");
						echo "<h5>" . $cate['titre'] . "</h5>";
						echo ("<img src='images/" . $cate['lienImage'] . "' alt='" . $cate['titre'] . "' width='auto' height='150px'/>");
						echo "<p>" . $cate['description'] . "</p>";
						echo ("<div class='btn top'><a href='annonce.php?id=" . $cate['id'] . "'>En savoir plus</a></div>");
						echo "</div>";
					}
				}
			} catch (PDOException $e) {
				echo 'Echec avec categorie : ' . $e->getMessage();
			}



			// ON RECHERCHE AVEC UN TITRE ET SANS CATEGORIE
		} else if (isset($_POST['categorie']) && ($_POST['categorie'] == "Catégorie" || $_POST['categorie'] == "") && $_POST['titre'] != "" && $_POST['prixmin'] == "" && $_POST['prixmax'] == "") {
			try {
				$requete2 =  "SELECT * FROM annonce WHERE titre ='" . $_POST['titre'] . "';";
				$nombre = $connexion->prepare($requete2);
				$nombre->execute(array());
				$num_of_rows = $nombre->rowCount();
				if ($num_of_rows == 0) {
					echo '<p style="color:red;">Aucun résultat !</p>';
				} else {
					if ($num_of_rows==1){
						echo "<p style='color:green;'>".$num_of_rows." résultat !</p>";
					}else{
						echo "<p style='color:green;'>".$num_of_rows." résultats !</p>";
					}
					foreach ($connexion->query($requete2) as $cate) {
						echo ("<div class='ser-grid-list'>");
						echo "<h5>" . $cate['titre'] . "</h5>";
						echo ("<img src='images/" . $cate['lienImage'] . "' alt='" . $cate['titre'] . "' width='auto' height='150px'/>");
						echo "<p>" . $cate['description'] . "</p>";
						echo ("<div class='btn top'><a href='annonce.php?id=" . $cate['id'] . "'>En savoir plus</a></div>");
						echo "</div>";
					}
				}
			} catch (PDOException $e) {
				echo 'Echec titre sans prix: ' . $e->getMessage();
			}



			//RECHERCHE AVANCEE
		}else if (isset($_POST['categorie']) && ($_POST['categorie'] == "Catégorie" || $_POST['categorie'] == "") && $_POST['titre'] != "" && $_POST['prixmin'] != "" && $_POST['prixmax'] != "") {
			try {
				$requete2 =  "SELECT * FROM annonce WHERE titre ='" . $_POST['titre'] ."' AND prix >='".$_POST['prixmin']."' AND prix <='".$_POST['prixmax']."';";
				$nombre = $connexion->prepare($requete2);
				$nombre->execute(array());
				$num_of_rows = $nombre->rowCount();
				if ($num_of_rows == 0) {
					echo '<p style="color:red;">Aucun résultat !</p>';
				} else {
					if ($num_of_rows==1){
						echo "<p style='color:green;'>".$num_of_rows." résultat !</p>";
					}else{
						echo "<p style='color:green;'>".$num_of_rows." résultats !</p>";
					}
					foreach ($connexion->query($requete2) as $cate) {
						echo ("<div class='ser-grid-list'>");
						echo "<h5>" . $cate['titre'] . "</h5>";
						echo ("<img src='images/" . $cate['lienImage'] . "' alt='" . $cate['titre'] . "' width='auto' height='150px'/>");
						echo "<p>" . $cate['description'] . "</p>";
						echo "<p>" . $cate['prix'] . "</p>";
						echo ("<div class='btn top'><a href='annonce.php?id=" . $cate['id'] . "'>En savoir plus</a></div>");
						echo "</div>";
					}
				}
			} catch (PDOException $e) {
				echo 'Echec Titre avec prix : ' . $e->getMessage();
			}



			//TOUT REMPLI
		} else if (isset($_POST['categorie']) && ($_POST['categorie'] != "Catégorie" && $_POST['categorie'] != "") && $_POST['titre'] != "") {
			try {
				$requete2 =  "SELECT * FROM annonce WHERE titre ='" . $_POST['titre'] . "' AND categorie =" . $_POST['categorie'];
				$nombre = $connexion->prepare($requete2);
				$nombre->execute(array());
				$num_of_rows = $nombre->rowCount();
				if ($num_of_rows == 0) {
					echo '<p style="color:red;">Aucun résultat !</p>';
				} else {
					if ($num_of_rows==1){
						echo "<p style='color:green;'>".$num_of_rows." résultat !</p>";
					}else{
						echo "<p style='color:green;'>".$num_of_rows." résultats !</p>";
					}
					foreach ($connexion->query($requete2) as $cate) {
						echo ("<div class='ser-grid-list'>");
						echo "<h5>" . $cate['titre'] . "</h5>";
						echo ("<img src='images/" . $cate['lienImage'] . "' alt='" . $cate['titre'] . "' width='auto' height='150px'/>");
						echo "<p>" . $cate['description'] . "</p>";
						echo ("<div class='btn top'><a href='annonce.php?id=" . $cate['id'] . "'>En savoir plus</a></div>");
						echo "</div>";
					}
				}
			} catch (PDOException $e) {
				echo 'Echec Prix et Titre : ' . $e->getMessage();
			}
		}
		?>
		<div class="clear"></div>
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