<?php
include("inc/top.php");
session_start();
if ($_SESSION['CONNECTE'] != 'YES') {
    header('Location: login.php');
}

?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Ajouter une Annonce</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="list_annonces.php">Annonces</a></li>
        <li class="breadcrumb-item active">Ajouter</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">


            <?php
            if ($_GET["message"] == "reussie") {
                echo '<h2 style="color:green;">Ajout réussi</h2>';
            } else if ($_GET["message"] == "echoue") {
                echo '<h2 style="color:red;">Erreur dans l\'ajout !</h2>';
            } else if ($_GET["message"] == "mdp") {
                echo '<h2 style="color:red;">Le mot de passe n\'est pas le même !</h2>';
            }
            ?>


            <form method="POST" action="annonce_ajouter1.php" enctype="multipart/form-data">
                <div class="register-top-grid">
                    <h3>Vos informations sur l'Annonce</h3>
                    <br />
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
                                    </select>






                                </td>

                            </tr>
                        </table>
                    </div>

                    <input type="submit" name="envoyer" value="Ajouter">

                </div>

        </div>

    </div>
    </form>
</div>