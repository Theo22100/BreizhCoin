<?php
session_start();
include("inc/top.php");
?>

<!-- debut de la partie contenu -->
<html>

<head>
	<meta charset=”utf-8″>

	<!-- Fonction pour détecter champ vide en js d'après cahier des charges -->
	<script type="text/javascript">
		function verif() {
			if (document.getElementById("userName").value == "") {
				alert("Pensez à taper un message !");
				document.getElementById("userName").focus();
				return false;
			}
			if (document.getElementById("userEmail").value == "") {
				alert("Tapez un Email valable pour avoir une réponse.");
				document.getElementById("userEmail").focus();
				return false;
			}
			if (document.getElementById("userPhone").value == "") {
				alert("Pensez à taper un numéro de Téléphone !");
				document.getElementById("userPhone").focus();
				return false;
			}
			if (document.getElementById('userMsg').value == "") {
				alert("Pensez à taper un message !");
				document.getElementById("userMsg").focus();
				return false;
			}
		}
	</script>
	<!-- Fin de la fonction -->

</head>

<body>
	<div class="main">
		<div class="section group">
			<div class="col span_1_of_2">
				<div class="contact_info">
					<h3>Nous trouver</h3>
					<div class="map">
						<iframe width="100%" height="175" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2663.5868220944812!2d-1.641995684855227!3d48.11820566048978!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x480edee5d13d72cd%3A0x570f619868b57bc!2sUniversit%C3%A9%20de%20Rennes%201%20-%20Campus%20Beaulieu!5e0!3m2!1sfr!2sfr!4v1653489884171!5m2!1sfr!2sfr"></iframe>
						</iframe>
						<br>
						<small>
							<a href="https://www.google.com/maps/place/Universit%C3%A9+de+Rennes+1+-+Campus+Beaulieu/@48.1182057,-1.6419957,17z/data=!3m1!4b1!4m5!3m4!1s0x480edee5d13d72cd:0x570f619868b57bc!8m2!3d48.1182021!4d-1.639807" style="color: rgba(180, 192, 21, 0.71);;text-align:left;font-size:12px">Voir en plus grand</a>
						</small>
					</div>
				</div>
				<div class="company_address">
					<h3>Nous situer</h3>
					<p>Beaulieu</p>
					<p>35000 Rennes</p>
					<p>FR</p>
					<p>Phone:(00) 222 666 444</p>
					<p>Fax: (000) 000 00 00 0</p>
					<p>Email: <span>info@mycompany.com</span></p>
					<p>Follow on: <span>Facebook</span>, <span>Twitter</span></p>
				</div>
			</div>
			<div class="col span_2_of_4">
				<div class="contact-form">
					<?php
					if (isset($_GET['message']) && $_GET["message"] == "echoue") {
						echo '<h2 style="color:red;">Votre message n\'a pas pu être envoyé !</h2>';
					} else if (isset($_GET['message']) && $_GET["message"] == "reussi") {
						echo '<h2 style="color:green;">Votre message a été envoyé !</h2>';
					}
					?>
					<h3>Nous écrire</h3>
					<form method="POST" onsubmit="return verif()" action="contact1.php">
						<div>
							<span><label>Nom</label></span>
							<span><input name="userName" id="userName" type="text" class="textbox"></span>
						</div>
						<div>
							<span><label>Email</label></span>
							<span><input name="userEmail" id="userEmail" type="text" class="textbox"></span>
						</div>
						<div>
							<span><label>Téléphone</label></span>
							<span><input name="userPhone" id="userPhone" type="text" class="textbox"></span>
						</div>
						<div>
							<span><label>Message</label></span>
							<span><textarea name="userMsg" id="userMsg"> </textarea></span>
						</div>
						<div>
							<span><input type="submit" value="Envoyer"></span>
						</div>
					</form>

				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<!-- fin de la partie contenu -->

	<?php
	include("inc/bottom.php");
	?>
</body>