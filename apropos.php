<?php
include("inc/top.php");
session_start();
?>

<!-- debut de la partie contenu -->
<div class="main">
<div class="about">
		<div class="abt_para">
	    	 <a href="contact.php"><h3>Prendre contact </h3></a>
			 <p>Vous pouvez envoyer un message au support en cliquant sur le bouton !</p>
			<div class="btn top-right"><a href=" contact.php">Contact</a></div>
		 </div>
		 <div class="abt_img">
			<img src="images/pic1.jpg">
		</div>
		<div class="clear"></div>
		<p>Site fait par :</p>
		<p>Eleve 1 : GUÉRIN Théo (20217000)</p>
		<p>Eleve 2 : THEBAULT Lucas (20204575)</p>
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