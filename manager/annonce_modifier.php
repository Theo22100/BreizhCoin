<?php
include("inc/top.php");
session_start();
if ($_SESSION['CONNECTE'] != 'YES') {
    header('Location: login.php');
}

?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Liste des Annonces</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="list_annonces.php">Annonces</a></li>
            <li class="breadcrumb-item active">Modifier</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Annonces / Modification
            </div>
            <div class="card-body">

                <?php

                if ($_GET["message"] == "modifreussie") {
                    echo '<p style="color:green;">La Modification a été effectué !</p>';
                } else if ($_GET["message"] == "modifechoue") {
                    echo '<p style="color:red;">La Modification n\'a pas été effectué !</p>';
                }
                $serveur = "localhost";
                $login = "root";
                $pass = "root";

                $idmodif = $_GET['id'];

                try {
                    $conn = new PDO("mysql:host=$serveur;dbname=cours", $login, $pass);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = "SELECT titre,description,prix,lienImage,categorie,date FROM annonce WHERE id= $idmodif";


                    echo "<table id='datatablesSimple'>";
                    echo "<thead>";
                    echo "  <tr>
                                                <td>
                                                    <b>Titre</b>
                                                </td>
                                                <td>
                                                    <b>Description</b>
                                                </td>
                                                <td>
                                                    <b>Prix</b>
                                                </td>
                                                <td>
                                                    <b>Image</b>
                                                </td>
                                                <td>
                                                    <b>Catégorie</b>
                                                </td>
                                                <td>
                                                    <b>Date</b>
                                                </td>
                                            </tr>";
                    echo "</thead>";
                    echo "<tbody><tr>";

                    foreach ($conn->query($stmt) as $row) {
                        echo "<td>" . $row['titre'] . "</td>";
                        echo "<td>" . $row['description'] . "</td>";
                        echo "<td>" . $row['prix'] . "</td>";
                        echo "<td><img src='../images/" . $row['lienImage'] . "' alt=".$row['titre']."' width='100px' height='100px'/></td>";


                        echo "<td>"; 
                        try{

                            $requete3 =  "SELECT nom FROM categorie WHERE id='".$row['categorie']."';";



                            foreach ($conn->query($requete3) as $cat) {
                                echo $cat['nom'];
                            }
                        }
                        catch (PDOException $e){
                            echo 'Echec Connexion 2 : ' .$e->getMessage();
                        }
                        
                        
                        
                        echo "</td>";





                        echo "<td>" . $row['date'] . "</td></tr>";
                        echo "<tr><td> 
                                                <form method='POST' action='annonce_modifiertitre1.php?num=$idmodif'>
                                                    <input type = 'text' name = 'titre' id = 'titre' required='required'><br>
                                                    <input type='submit' name='changertitre' value='Changer Titre'> 
                                                </form>
                                            </td>";
                        echo "<td> 
                                            <form method='POST' action='annonce_modifierdescription1.php?num=$idmodif'>
                                                <input type = 'text' name = 'description' id = 'description' required='required'><br>
                                                <input type='submit' name='changerdescription' value='Changer Description'> 
                                            </form>
                                        </td>";
                        echo "<td> 
                                            <form method='POST' action='annonce_modifierprix1.php?num=$idmodif'>
                                                <input type = 'number' name = 'prix' id = 'prix' required='required'><br>
                                                <input type='submit' name='changerprix' value='Changer Prix'> 
                                            </form>
                                        </td>";
                        echo "<td> 
                                                <form method='POST' action='annonce_modifierlienImage1.php?num=$idmodif' enctype='multipart/form-data'>
                                                    <input type = 'file' name = 'lienImage' id = 'lienImage' required='required'><br>
                                                    <input type='submit' name='changerimage' value='Changer Image'> 
                                                </form>
                                            </td>";
                        echo "<td> 
                                            <form method='POST' action='annonce_modifiercategorie1.php?num=$idmodif'>


                                            <select name='categorie'>";



                        $serveur = "localhost";
                        $login = "root";
                        $pass = "root";

                        try {

                            $requete2 =  "SELECT id,nom FROM categorie";


                            foreach ($conn->query($requete2) as $row) {
                                echo "<option value='" . $row['id'] . "'>" . $row['nom'] . "</option>";
                            }
                        } catch (PDOException $e) {
                            echo 'Echec : ' . $e->getMessage();
                        }

                        echo "                      
                                                <input type='submit' name='changercategorie' value='Changer Categorie'> 
                                                </select>
                                                </form>
                                            </td>";
                        echo "<td> 
                                            <form method='POST' action='annonce_modifierdate1.php?num=$idmodif'>
                                                <input type = 'date' name = 'date' id = 'date' required='required'><br>
                                                <input type='submit' name='changerdate' value='Changer Date'> 
                                            </form>
                                        </td></tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                } catch (PDOException $e) {
                    echo 'Echec : ' . $e->getMessage();
                }
                ?>
            </div>
        </div>
    </div>
</main>

<!-- fin contenu -->


<?php
include("inc/bottom.php");
?>