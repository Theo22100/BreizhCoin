<?php
include("inc/top.php");
session_start();
if ($_SESSION['CONNECTE']!='YES'){
    header('Location: login.php');
}

?>
    <div class="container-fluid px-4">
                        <h1 class="mt-4">Ajouter un Admin</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="list_admins.php">Admins</a></li>
                            <li class="breadcrumb-item active">Ajouter</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                

                            <?php
				if ($_GET["message"]=="reussie"){
						echo '<h2 style="color:green;">Ajout réussi</h2>';
					}else if ($_GET["message"]=="echoue"){
						echo '<h2 style="color:red;">Erreur dans l\'ajout !</h2>';
					}else if ($_GET["message"]=="mdp"){
						echo '<h2 style="color:red;">Le mot de passe n\'est pas le même !</h2>';
					}
			?>


				<form method="POST" action="admin_ajouter1.php">
					<div class="register-top-grid">
						<h3>Vos informations</h3>
                        <br/>
                        <div>
                            <table border="0">
                                <tr>
                                    <td><span>Prénom<label>*</label></span></td>
                                    <td><input type = "text" name = "prenom" id = "prenom" required="required"></td>
                                </tr>
                                <tr>
                                    <td><span>Nom<label>*</label></span></td>
                                    <td><input type = "text" name = "nom" id = "nom" required="required"> </td>
                                </tr>
                                <tr>
                                    <td><span>Email<label>*</label></span></td>
                                    <td><input type = "mail" name = "mail" id = "mail" required="required"> </td>

                                </tr>
                            </table>
                        </div>

						<div class="register-bottom-grid">
                            <br/>
							<h3>Pour vous authentifier</h3>
                            <br/>
                            <div>
                                <table border="0">
                                    <tr>
                                        <td><span>Password<label>*</label></span></td>
                                        <td><input type="password" name="password" id="password" placeholder="eR8!z6$" required="required"></td>
                                    </tr>
                                    <tr>
                                        <td><span>Retapez votre Password<label>*</label></span></td>
                                        <td><input type="password" name="confirm_password" id="confirm_password" placeholder="eR8!z6$" required="required"></td>
                                    </tr>
                                </table>
                            </div>

							<div>
                            <br/>
								<input type="submit" name="envoyer" value="Ajouter">

							</div>

						</div>

					</div>
				</form>

                                
                            </div>
                        </div>
</div>