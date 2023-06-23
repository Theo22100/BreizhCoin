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
                        <h1 class="mt-4">Catégories</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Catégories</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                    <a href='categorie_ajouter.php'>Ajouter une nouvelle catégorie</a>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Catégories
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
                            $requete1 =  "SELECT id,nom FROM categorie";

                            echo "<table id='datatablesSimple'>";
                                echo "<thead>";
                                    echo "  <tr>
                                                <td>
                                                    <b>ID</b>
                                                </td>
                                                <td>
                                                    <b>Nom</b>
                                                </td>
                                                <td>
                                                    <b>Nombre d'annonces associés</b>
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
                                        echo "<td>" . $row['nom'] . "</td>";
                                        echo "<td>";
                                        try {
                        
                        
                                
                                            $sql = $connexion -> prepare("SELECT id FROM annonce WHERE categorie=".$row['id'].";");
                                            
                        
                        
                                            $sql->execute(array());
                                            
                        
                        
                        
                                            $num_of_rowsannonce = $sql->rowCount() ;
                                            echo $num_of_rowsannonce;
                                        }
                                        catch (PDOException $e){
                                            echo 'Echec Connexion : ' .$e->getMessage();
                                        }
                                        echo "</td>";
                                        echo '<td style="text-align:center"><a href="categorie_modifier.php?id='.$row['id'].'"><img src="images/modif.png" alt="Modifier"/></a></td>';
                                        echo '<td style="text-align:center"><a href="categorie_supprimer.php?id='.$row['id'].'"><img src="images/croix.png" alt="Efface"/></a></td></tr>';
                                    }
                                echo "</tbody>";
                            echo "</table>";
                        }catch (PDOException $e){
                            echo 'Echec 2 : ' .$e->getMessage();
                        }
                    ?>
                        </div>
                    </div>
                </main>

                                <!-- fin contenu -->
               
               
<?php
include("inc/bottom.php");
?>
