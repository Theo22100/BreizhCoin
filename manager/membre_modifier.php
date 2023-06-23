<?php
    include("inc/top.php");
    session_start();
    if ($_SESSION['CONNECTE']!='YES'){
        header('Location: login.php');
    }
    
?>
    <main>
        <div class="container-fluid px-4">
        <h1 class="mt-4">Liste des Salariés</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="list_membres.php">Salariés</a></li>
            <li class="breadcrumb-item active">Modifier</li>
        </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                        Salariés / Modification
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
                            $stmt= "SELECT nom,position,startdate,office,age,salary FROM salarie WHERE id= $idmodif";


                            echo "<table id='datatablesSimple'>";
                                echo "<thead>";
                                    echo "  <tr>
                                                <td>
                                                    <b>Nom</b>
                                                </td>
                                                <td>
                                                    <b>Position</b>
                                                </td>
                                                <td>
                                                    <b>Date de début</b>
                                                </td>
                                                <td>
                                                    <b>Office</b>
                                                </td>
                                                <td>
                                                    <b>Age</b>
                                                </td>
                                                <td>
                                                    <b>Salaire</b>
                                                </td>
                                            </tr>";
                                    echo "</thead>";
                                echo "<tbody><tr>";

                                    foreach($conn->query($stmt) as $row){
                                        echo "<td>" . $row['nom'] . "</td>";
                                        echo "<td>" . $row['position'] . "</td>";
                                        echo "<td>" . $row['startdate'] . "</td>";
                                        echo "<td>" . $row['office'] . "</td>";
                                        echo "<td>" . $row['age'] . "</td>";
                                        echo "<td>" . $row['salary'] . "</td></tr>";
                                        echo "<tr><td> 
                                                <form method='POST' action='membre_modifiernom1.php?num=$idmodif'>
                                                    <input type = 'text' name = 'nom' id = 'nom' required='required'><br>
                                                    <input type='submit' name='changernom' value='Changer Nom'> 
                                                </form>
                                            </td>";
                                            echo "<td> 
                                            <form method='POST' action='membre_modifierposition1.php?num=$idmodif'>
                                                <input type = 'text' name = 'position' id = 'position' required='required'><br>
                                                <input type='submit' name='changerposition' value='Changer Position'> 
                                            </form>
                                        </td>";
                                        echo "<td> 
                                                <form method='POST' action='membre_modifierstartdate1.php?num=$idmodif'>
                                                    <input type = 'date' name = 'startdate' id = 'startdate' required='required'><br>
                                                    <input type='submit' name='changerstartdate' value='Changer Date'> 
                                                </form>
                                            </td>";
                                            echo "<td> 
                                            <form method='POST' action='membre_modifieroffice1.php?num=$idmodif'>
                                                <input type = 'text' name = 'office' id = 'office' required='required'><br>
                                                <input type='submit' name='changeroffice' value='Changer Office'> 
                                            </form>
                                        </td>";
                                            echo "<td> 
                                            <form method='POST' action='membre_modifierage1.php?num=$idmodif'>
                                                <input type = 'number' name = 'age' id = 'age' required='required'><br>
                                                <input type='submit' name='changerage' value='Changer Age'> 
                                            </form>
                                        </td>";
                                        echo "<td> 
                                        <form method='POST' action='membre_modifiersalary1.php?num=$idmodif'>
                                            <input type = 'number' name = 'salary' id = 'salary' required='required'><br>
                                            <input type='submit' name='changersalary' value='Changer Salaire'> 
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
