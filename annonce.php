<?php
include("inc/top.php");
session_start();
?>

<!-- debut de la partie contenu -->
<div class="main">
	<div class="details">
		<div class="product-details">
			<div class="images_3_of_2">
				<div id="container">
					<div id="products_example">
						<div id="products">
							<div class="slides_container">

								<?php
								$serveur = "localhost";
								$login = "root";
								$pass = "root";

								try {


									$bdd = new PDO("mysql:host=localhost;dbname=cours", "root", "root");
									$annonce = $bdd->query("SELECT * FROM annonce WHERE id=" . $_GET['id'])->fetch();

									echo ("<a href='#' target='_blank'><img src='images/" . $annonce['lienImage'] . "' alt='" . $annonce['titre'] . "' /></a>");
								} catch (PDOException $e) {
									echo 'Echec Connexion: ' . $e->getMessage();
								}

								?>
							</div>
							<ul class="pagination">
								<?php

								if (isset($_GET['id'])) {



									echo ("<li><a href='#'><img src='images/" . $annonce['lienImage'] . "' alt='" . $annonce['titre'] . "' width='100px'/></a></li>");
								}

								?>


							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="desc span_3_of_2">
				<?php
				if (isset($_GET['id'])) {

					echo "<h2>" . $annonce['titre'] . "</h2><p>" . $annonce['description'] . "</p><div class='price'><p>Prix: <span>" . $annonce['prix'] . "</span></p>
					</div>";
				}
				?>
				<!-- <h2>titre de l'annonce</h2>
				<p>texte de l'annonce</p>
				<div class="price">
					<p>Prix: <span>500 �</span></p>
				</div> -->

				<?php
				if (isset($_SESSION['rang']) && $_SESSION['rang']=="0") {

					echo ("<div class='wish-list'>
						<ul>
							<li class='wish'><a href='favoris1.php?id=" . $_GET['id'] . "'>Ajouter à mes favoris</a></li>
						</ul>
					</div>");
				} else {
					echo ("<div class='wish-list'>
						<h5 style='color:red;'>Vous devez être connecté pour ajouter à vos favoris !</h5>
					</div>");
				}
				?>
			</div>
			<div class="clear"></div>
		</div>



		<div class="content_bottom">
			<div class="text-h1 top1 btm">
				<h2>Annonces qui pourraient vous intéresser</h2>
			</div>
			<div class="div2">
				<div id="mcts1">
					<?php try {
					$serveur = "localhost";
					$login="root";
					$pass="root";
					$connexion = new PDO("mysql:host=$serveur;dbname=cours", $login, $pass);
					$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$requete4 =  "SELECT id,titre,lienImage FROM annonce WHERE categorie = (SELECT categorie FROM annonce WHERE id = ".$_GET['id'].") LIMIT 3";
					foreach ($connexion->query($requete4) as $lien) {
						echo "<div class='w3l-img'>
						<a href='annonce.php?id=".$lien['id']."'><img src='images/".$lien['lienImage']."' alt='".$lien['titre']."' width='100px' height='100px'/></a></div>";
					}
				} catch (PDOException $e) {
					echo 'Echec : ' . $e->getMessage();
				}
				?>

					<div class="clear"></div>
				</div>
			</div>

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