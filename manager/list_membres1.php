<?php
session_start();
if ($_SESSION['CONNECTE']!='YES'){
    header('Location: login.php');
}

                                    $serveur = "localhost";
                                    $login = "root";
                                    $pass = "root";
                                    
                                    try{
                                        $connexion = new PDO("mysql:host=$serveur;dbname=cours", $login, $pass);
                                        $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        
                                        $requete1 =  "SELECT id,nom,position,startdate,office,age,salary FROM salarie";
                                        

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
                                                        <b>Position</b>
                                                    </td>
                                                    <td>
                                                        <b>Date de lancement</b>
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
                                                    <td>
                                                        <b>Modifier</b>
                                                    </td>
                                                    <td>
                                                        <b>Supprimer</b>
                                                    </td>
                                                </tr>";
                                            echo "</thead>";
                                            echo "<tbody>";

                                        foreach($connexion->query($requete1) as $row){
                                            echo "<td>" . $row['id'] . "</td>";
                                            echo "<td>" . $row['nom'] . "</td>";
                                            echo "<td>" . $row['position'] . "</td>";
                                            echo "<td>" . $row['startdate'] . "</td>";
                                            echo "<td>" . $row['office'] . "</td>";
                                            echo "<td>" . $row['age'] . "</td>";
                                            echo "<td> $" . $row['salary'] . "</td>";
                                            echo '<td style="text-align:center"><a href="membre_modifier.php?id='.$row['id'].'"><img src="images/modif.png" alt="Modifier"/></a></td>';
                                            echo '<td style="text-align:center"><a href="membre_supprimer.php?id='.$row['id'].'"><img src="images/croix.png" alt="Efface"/></a></td></tr>';
                                        }
                                        echo "</tbody>";
                                        echo "</table>";
                                    }

                                    catch (PDOException $e){
                                        echo 'Echec : ' .$e->getMessage();
                                    }
                                ?>