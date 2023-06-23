<?php
include("inc/top.php");
session_start();
if ($_SESSION['CONNECTE']!='YES'){
    header('Location: login.php');
}

?>


            
            <!--  debut contenu -->
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Annonces</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Annonces</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                    <a href='annonce_ajouter.php'>Ajouter une nouvelle annonce</a>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Annonces
                            </div>
                            <?php

                        if ($_GET["message"]=="supechoue"){
                            echo '<p style="color:red;">La suppression n\'a pas pu être effectué !</p>';
                        }else if($_GET["message"]=="supreussie"){
                            echo '<p style="color:green;">La supression a été effectué !</p>';
                        }

                        $serveur = "localhost";
                        $login = "root";
                        $pass = "root";
                                        
                        try{
                            $connexion = new PDO("mysql:host=$serveur;dbname=cours", $login, $pass);
                            $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $requete1 =  "SELECT * FROM annonce";
                                            

                            echo "<table id='datatablesSimple'>";
                                echo "<thead>";
                                    echo "  <tr>
                                                <td>
                                                    <b>ID</b>
                                                </td>
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
                                                <td>
                                                    <b>Modifier</b>
                                                </td>
                                                <td>
                                                    <b>Supprimer</b>
                                                </td>
                                            </tr>";
                                    echo "</thead>";
                                echo "<tbody><tr>";

                                    foreach($connexion->query($requete1) as $row){
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['titre'] . "</td>";
                                        echo "<td>" . $row['description'] . "</td>";
                                        echo "<td>" . $row['prix'] . "</td>";
                                        echo "<td style='text-align:center'><img src='../images/" . $row['lienImage'] . "' alt='" . $row['titre'] . "' width='auto' height='100px'/></td>";
                                        echo "<td>";

                                        try{

                                            $requete2 =  "SELECT nom FROM categorie WHERE id='".$row['categorie']."';";



                                            foreach ($connexion->query($requete2) as $cat) {
                                                echo $cat['nom'];
                                            }
                                        }
                                        catch (PDOException $e){
                                            echo 'Echec Connexion 2 : ' .$e->getMessage();
                                        }

                                        

                                        echo "</td>";
                                        echo "<td>" . $row['date'] . "</td>";
                                        echo '<td style="text-align:center"><a href="annonce_modifier.php?id='.$row['id'].'"><img src="images/modif.png" alt="Modifier"/></a></td>';
                                        echo '<td style="text-align:center"><a href="annonce_supprimer.php?id='.$row['id'].'"><img src="images/croix.png" alt="Efface"/></a></td></tr>';
                                    }
                                echo "</tbody>";
                            echo "</table>";
                        }catch (PDOException $e){
                            echo 'Echec 1 : ' .$e->getMessage();
                        }
                    ?>
                        </div>
                    </div>
                </main>

                                <!-- fin contenu -->
               
               
<?php
include("inc/bottom.php");
?>
