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
				if ($_SESSION['rang']!="0"){

				
					echo('<div class="s_btn">');
						echo("<ul>");
							echo("<li><h2>Bienvenue !</h2></li>");
							echo('<li><h3><a href="login.php">Se connecter</a></h3></li>');
							echo("<li><h2>Nouveau visiteur ?</h2></li>");
							echo("<li><h4><a href='sinscrire.php'>S'enregistrer</a></h4></li>");
							echo('<div class="clear"></div>');
						echo("</ul>");
					echo("</div>");
				}
			?>

			<div class="grid">
				<?php

				//Trouver un élément aléatoire
					$bdd = new PDO("mysql:host=localhost;dbname=cours", "root", "root");
					$requete = $bdd->prepare("SELECT id FROM annonce");
					$requete->execute();
					$nombreColonnes = $requete->rowCount();
					$rand = rand(1,$nombreColonnes);
					$requete = $bdd->query("SELECT * FROM annonce WHERE id=".$rand)->fetch();
					echo "<div class='grid-img'>
					<a href='annonce.php?id=".$rand."'><img src='images/".$requete['lienImage']."' alt=''/></a>
				</div>";
					$nombres = range(1,$nombreColonnes);
					shuffle($nombres);
					

					echo "<div class='grid-para'>
					<h2>Nouveau sur le site</h2>
					<h3>A vendre Joli produit</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					<div class='btn top'>
						<a href='annonce.php'>Details&nbsp;<img src='images/marker2.png'></a>
					</div>
					</div>
					<div class='clear'></div>
					</div>
					</div>
					<div class='cnt-main btm'>
					<div class='section group'>";
					for($n=1;$n<7;$n++){
						$annonce = $bdd->query("SELECT * FROM annonce WHERE id=".$n)->fetch();
						echo "<div class='grid_1_of_3 images_1_of_3'>
						<a href='annonce.php?id=".$n."'><img src='images/".$annonce['lienImage']."' alt='' /></a>
						<a href='annonce.php?id=".$n."'>
							<h3>".$annonce['titre']."</h3>
						</a>
						<div class='cart-b'>
							<span class='price left'><sup>".$annonce['prix']."</sup><sub></sub></span>
							<div class='btn top-right right'><a href='annonce.php?id=$n'>Ajouter à mes favoris</a></div>
							<div class='clear'></div>
						</div>
					</div>";
					}
					echo "</div>
					</div></div>";
				?>
			

</div>
</div>

<div class="clear"></div>
</div>

<!-- fin de la partie contenu -->
<?php
include("inc/bottom.php");
?>
