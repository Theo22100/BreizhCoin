<?php
session_start();
include("inc/top.php");
include("inc/categories.php");
?>

<!-- debut de la partie contenu -->

<div class="content">
	<div class="clear"></div>
	<div class="cnt-main">

		<?php
		if (isset($_SESSION['rang']) && $_SESSION['rang'] != "0") {


			echo ('<div class="s_btn">');
			echo ("<ul>");
			echo ("<li><h2>Bienvenue !</h2></li>");
			echo ('<li><h3><a href="login.php">Se connecter</a></h3></li>');
			echo ("<li><h2>Nouveau visiteur ?</h2></li>");
			echo ("<li><h4><a href='sinscrire.php'>S'enregistrer</a></h4></li>");
			echo ('<div class="clear"></div>');
			echo ("</ul>");
			echo ("</div>");
		}
		?>

		<div class="grid">
			<?php


			$bdd = new PDO("mysql:host=localhost;dbname=cours", "root", "root");
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			try {
				///////////////////////
				$tab=array();
				$requete2 =  "SELECT id FROM annonce ORDER BY date DESC,rand() LIMIT 5;";
				foreach ($connexion->query($requete2) as $annoncenv) {
					array_push($tab,$annoncenv['id']);
					}
				
				}catch (PDOException $e) {
					echo 'Echec Element aléatoire: ' . $e->getMessage();
				}


				/////////////////////
				$aleatoire = array_rand($tab,1);
				$idnv =$tab[$aleatoire];

				$nv = $bdd->query("SELECT * FROM annonce WHERE id = ".$idnv.";")->fetch();



				echo "<div class='grid-img' align='center'>
						<a href='annonce.php?id=" . $nv['id'] . "'><img src='images/" . $nv['lienImage'] . "' alt='" . $nv['titre'] . "' width='auto' height='150px'/></a>
					</div>";

				echo "<div class='grid-para'>
					<h2>Nouveau sur le site</h2>
					<h3>A vendre ".$nv['titre']."</h3>
					<p>".$nv['description']."</p>
					<p>".$nv['prix']."</p>
					<div class='btn top'>
						<a href='annonce.php?id=".$nv['id']."'>Details&nbsp;<img src='images/marker2.png'></a>
					</div></div>";

				



			?>
			
				<div class='clear'></div>
		</div>
	</div>
	<div class='cnt-main btm'>
		<div class='section group'>";

		<?php
		for($n=1;$n<7;$n++){
			try {
				$requete = $bdd->query("SELECT * FROM annonce ORDER BY RAND()")->fetch();

				echo "<div class='grid_1_of_3 images_1_of_3'>
				<a href='annonce.php?id=" . $requete['id'] . "'><img src='images/" . $requete['lienImage'] . "' alt='" . $requete['titre'] . "' /></a>
				<a href='annonce.php?id=" . $requete['id'] . "'>
					<h3>" . $requete['titre'] . "</h3>
				</a>
				<div class='cart-b'>
					<span class='price left'><sup>" . $requete['prix'] . "</sup><sub></sub></span>
					<div class='btn top-right right'><a href='annonce.php?id=".$requete['id']."'>Ajouter à mes favoris</a></div>
					<div class='clear'></div>
				</div>
			</div>";

				
				} catch (PDOException $e) {
					echo 'Echec Element aléatoire: ' . $e->getMessage();
				}
			
		}
		?>

		</div>
		</div>
	</div>

	<div class="clear"></div>
</div>

<!-- fin de la partie contenu -->
<?php
include("inc/bottom.php");
?>