<?php
include("inc/top.php");
session_start();
if ($_SESSION['CONNECTE']!='YES'){
    header('Location: login.php');
}

?>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Ajouter une Catégorie</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="list_categories.php">Catégories</a></li>
            <li class="breadcrumb-item active">Ajouter</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                                

                <?php
                    if ($_GET["message"]=="reussie"){
                            echo '<h2 style="color:green;">Ajout réussi</h2>';
                        }else if ($_GET["message"]=="echoue"){
                            echo '<h2 style="color:red;">Erreur dans l\'ajout !</h2>';
                        }
			    ?>


				<form method="POST" action="categorie_ajouter1.php">
					<div class="register-top-grid">
						<h3>Nom de la catégorie</h3>
                        <br/>
                        <div>
                            <table border="0">
                                <tr>
                                    <td><span>Nom<label>*</label></span></td>
                                    <td><input type = "text" name = "nom" id = "nom" required="required"> </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <br/>
					<input type="submit" name="envoyer" value="Ajouter">
                </form>
			</div>
        </div>
    </div>