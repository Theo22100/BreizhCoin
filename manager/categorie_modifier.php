<?php
    include("inc/top.php");
    session_start();
    if ($_SESSION['CONNECTE']!='YES'){
        header('Location: login.php');
    }
    
?>
    <main>
        <div class="container-fluid px-4">
        <h1 class="mt-4">Liste des Admins</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="list_categories.php">Catégories</a></li>
            <li class="breadcrumb-item active">Modifier</li>
        </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                        Catégories / Modifier
                </div>
                <div class="card-body">
                                    
                    <?php

                        if($_GET["message"]=="modifreussie"){
                            echo '<p style="color:green;">La Modification a été effectué !</p>';
                        }else if($_GET["message"]=="modifechoue"){
                            echo '<p style="color:red;">La Modification n\'a pas été effectué !</p>';
                        }
                        $serveur = "localhost";
                        $login = "root";
                        $pass = "root";

                        $idmodif=$_GET['id'];
                                        
                        try{
                            $conn = new PDO("mysql:host=$serveur;dbname=cours", $login, $pass);
                            $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $stmt= "SELECT nom FROM categorie WHERE id= $idmodif";


                            echo "<table id='datatablesSimple'>";
                                echo "<thead>";
                                    echo "  <tr>
                                                <td>
                                                    <b>Nom</b>
                                                </td>
                                            </tr>";
                                    echo "</thead>";
                                echo "<tbody><tr>";

                                    foreach($conn->query($stmt) as $row){
                                        echo "<td>" . $row['nom'] . "</td></tr>";
                                        echo "<tr><td> 
                                                <form method='POST' action='categorie_modifiernom1.php?num=$idmodif'>
                                                    <input type = 'text' name = 'nom' id = 'nom' required='required'><br>
                                                    <input type='submit' name='changernom' value='Changer Nom'> 
                                                </form>
                                            </td></tr>";
                                    }
                                echo "</tbody>";
                            echo "</table>";
                        }catch (PDOException $e){
                            echo 'Echec : ' .$e->getMessage();
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
