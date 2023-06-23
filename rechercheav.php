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

		<form method="POST" action="categories.php" enctype="multipart/form-data">
				<div class="register-bottom-grid">
					<h3>Recherche avancée</h3>
					<div>
						<table border="0">
							<tr>
								<td><span>Titre<label>*</label></span></td>
								<td><input type="text" name="titre" id="titre" required="required"></td>
							</tr>
							<tr>
								<td><span>Prix minimum<label>*</label></span></td>
								<td><input type="number" name="prixmin" id="prixmin" required="required"> </td>
							</tr>
							<tr>
								<td><span>Prix maximum<label>*</label></span></td>
								<td><input type="number" name="prixmax" id="prixmax" required="required"> </td>

							</tr>

						</table>
						<br/>
						<input type="submit" name="envoyer" value="Rechercher">

					</div>
				</div>
		</form>
	</div>


	


	<?php
	include("inc/bottom.php");
	?>
</body>