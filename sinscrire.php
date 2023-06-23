<?php
include("inc/top.php");
?>

<!-- debut de la partie contenu
Rajouter que ça enregistre la chose






--> 
<html>
	<head>
		<title>Inscription BreizhCoin</title>
		<meta charset=”utf-8″>
	</head>
	<body>
		<div class="main">
			<div class="register">


			<?php
				if (isset($_GET['message']) && $_GET["message"]=="reussie"){
						echo '<h2 style="color:green;">Inscription réussie</h2>';
					}else if (isset($_GET['message']) && $_GET["message"]=="echoue"){
						echo '<h2 style="color:red;">Inscription non valide</h2>';
					}else if (isset($_GET['message']) && $_GET["message"]=="mdp"){
						echo '<h2 style="color:red;">Le mot de passe n\'est pas le même !</h2>';
					}else if (isset($_GET['message']) && $_GET["message"]=="champ"){
						echo '<h2 style="color:red;">Veuillez remplir tous les champs !</h2>';
					}
			?>


				<form method="POST" action="sinscrire2.php">
					<div class="register-top-grid">
						<h3>Vos informations</h3>

						<div>
							<span>Prénom<label>*</label></span>
							<input type = "text" name = "prenom" id = "prenom" required="required">
						</div>


						<div>
							<span>Nom<label>*</label></span>
							<input type = "text" name = "nom" id = "nom" required="required"> 
						</div>

						<div>
							<span>Email<label>*</label></span>
							<input type = "text" name = "mail" id = "mail" required="required"> 
						</div>

						<div class="clear"> </div>
							<a class="news-letter" href="#">
								<label class="checkbox">
									<input type="checkbox" name="news">
										<i> </i>S'inscrire à la neswletter
								</label>
							</a>
						</div>

						<div class="register-bottom-grid">
							<h3>Pour vous authentifier</h3>
							<div>
								<span>Password<label>*</label></span>
								<input type="password" name="password" id="password" placeholder="eR8!z6$" required="required">
							</div>

							<div>
								<span>Retapez votre Password<label>*</label></span>
								<input type="password" name="confirm_password" id="confirm_password" placeholder="eR8!z6$" required="required">
							</div>

							<div class="register-but">
								<input type="submit" name="envoyer" value="M'inscrire">

							</div>

						</div>

					</div>
				</form>

				<div class="clear"> </div>

			</div>

			<div class="clear"></div>
		</div>
		<!-- fin de la partie contenu -->

		<?php
		include("inc/bottom.php");
		?>
	</body>
</html>