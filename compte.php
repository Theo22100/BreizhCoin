<?php
session_start();
if ($_SESSION['rang'] != "0") {
	header('Location: index.php');
}
include("inc/top.php");
?>
<html>

<head>
	<title>Mon Compte BreizhCoin</title>
	<meta charset=”utf-8″>
</head>

<body>
	<div class="main">
		<div class="register">

			<a href="manager/login.php">Panel admin</a>

			<?php
			if ($_GET["message"] == "mdpreussie") {
				echo '<h2 style="color:green;">Mot de passe changé</h2>';
			} else if ($_GET["message"] == "mdpechoue") {
				echo '<h2 style="color:red;">Erreur mot de passe</h2>';
			} else if ($_GET["message"] == "mdp") {
				echo '<h2 style="color:red;">Le mot de passe n\'est pas le même !</h2>';
			} else if ($_GET["message"] == "mailreussi") {
				echo '<h2 style="color:green;">Mail changé !</h2>';
			} else if ($_GET["message"] == "mailechoue") {
				echo '<h2 style="color:red;">Erreur mail !</h2>';
			} else if ($_GET["message"] == "prenomechoue") {
				echo '<h2 style="color:red;">Erreur avec le prénom saisi !</h2>';
			} else if ($_GET["message"] == "prenomreussi") {
				echo '<h2 style="color:green;">Prénom changé !</h2>';
			} else if ($_GET["message"] == "nomechoue") {
				echo '<h2 style="color:red;">Erreur avec le nom saisi !</h2>';
			} else if ($_GET["message"] == "nomreussi") {
				echo '<h2 style="color:green;">Nom changé !</h2>';
			} else if ($_GET["message"] == "anreussie") {
				echo '<h2 style="color:green;">Annonce ajoutée !</h2>';
			} else if ($_GET["message"] == "anechoue") {
				echo '<h2 style="color:red;">Annonce non ajoutée !</h2>';
			}
			?>

			<!-- Modifier nom -->
			<form method="POST" action="compte_ajouterannonce1.php" enctype="multipart/form-data">
				<div class="register-bottom-grid">
					<h3>Ajouter une annonce</h3>
					<div>
						<table border="0">
							<tr>
								<td><span>Titre<label>*</label></span></td>
								<td><input type="text" name="titre" id="titre" required="required"></td>
							</tr>
							<tr>
								<td><span>Description<label>*</label></span></td>
								<td><input type="text" name="description" id="nom" required="required"> </td>
							</tr>
							<tr>
								<td><span>Prix<label>*</label></span></td>
								<td><input type="number" name="prix" id="prix" required="required"> </td>

							</tr>
							<tr>
								<td><span>Image<label>*</label></span></td>
								<td><input type="file" name="lienImage" id="lienImage" accept='image/*'> </td>

							</tr>
							<tr>
								<td><span>Catégorie<label>*</label></span></td>
								<td>
									<select name='categorie'>
										<?php
										$serveur = "localhost";
										$login = "root";
										$pass = "root";

										try {
											$conn = new PDO("mysql:host=$serveur;dbname=cours", $login, $pass);
											$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

											$requete1 =  "SELECT id,nom FROM categorie";


											foreach ($conn->query($requete1) as $row) {
												echo "<option value='" . $row['id'] . "'>" . $row['nom'] . "</option>";
											}
										} catch (PDOException $e) {
											echo 'Echec : ' . $e->getMessage();
										}
										?>
								</td>
							</tr>
						</table>
						<br />
						<input type="submit" name="envoyer" value="Ajouter">
					</div>
				</div>
			</form>
			<div class="clear"> </div>
			<form method="POST" action="modifieprenom.php">
				<div class="register-bottom-grid">
					<h3>Changez votre Prénom (Actuellement :
						<?php
						echo $_SESSION['prenom'];

						?>
						)</h3>

					<div>
						<span>Prénom<label></label></span>
						<input type="text" name="prenom" id="prenom" required="required">
						<input type="submit" name="modifierprenom" value="Modifier">
					</div>
					<div class="clear"> </div>
				</div>
			</form>

			<div class="clear"> </div>
			<!-- Modifier nom -->
			<form method="POST" action="modifienom.php">
				<div class="register-bottom-grid">
					<h3>Changez votre Nom (Actuellement :
						<?php
						echo $_SESSION['nom'];

						?>
						)</h3>
					<div>
						<span>Nom<label></label></span>
						<input type="text" name="nom" id="nom" required="required">
						<input type="submit" name="modifiernom" value="Modifier">
					</div>
					<div class="clear"> </div>
				</div>
			</form>

			<div class="clear"> </div>
			<!-- Modifier email -->
			<form method="POST" action="modifiemail.php">
				<div class="register-bottom-grid">
					<h3>Changez votre Mail (Actuellement :
						<?php
						echo $_SESSION['mail'];

						?>
						)</h3>
					<div>
						<span>Mail<label></label></span>
						<div>
							<input type="mail" name="mail" id="mail" required="required">
						</div>
						<div>
							<input type="submit" name="modifiermail" value="Modifier">
						</div>
					</div>
					<div class="clear"> </div>
				</div>
			</form>

			<div class="clear"> </div>
			<!-- Modifier mdp -->
			<form method="POST" action="modifiemdp.php">
				<div class="register-bottom-grid">
					<h3>Changez votre Password</h3>
					<div>
						<span>Password</span>
						<input type="password" name="password" id="password" required="required">
					</div>

					<div>
						<span>Retapez votre Password</span>
						<input type="password" name="confirm_password" id="confirm_password" required="required">
					</div>

					<div class="register-but">
						<input type="submit" name="envoyermdp" value="Modifier">


					</div>

				</div>
			</form>

		</div>


		<div class="clear"> </div>

	</div>

	<div class="clear"></div>
	</div>


	<?php
	include("inc/bottom.php");
	?>
</body>