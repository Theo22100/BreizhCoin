<?php
include("inc/top.php");
session_start();
if ($_SESSION['CONNECTE'] != 'YES') {
    header('Location: login.php');
}

?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Statistiques</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Statistiques</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <table border='1'>
                <tr>
                    <td>Catégorie avec le + d'annonces :&nbsp;</td>
                    <td>

                        <?php
                        $serveur = "localhost";
                        $login = "root";
                        $pass = "root";

                        try {
                            $connexion = new PDO("mysql:host=$serveur;dbname=cours", $login, $pass);
                            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            $requete1 =  "SELECT categorie,count(categorie) as nbmax FROM annonce GROUP BY categorie ORDER by nbmax DESC LIMIT 0,1";


                            foreach ($connexion->query($requete1) as $caplus) {
                                try {
                                    $requete1nom =  "SELECT nom FROM categorie WHERE id =" . $caplus['categorie'] . ";";
                                    foreach ($connexion->query($requete1nom) as $caplusnom) {
                                        echo ($caplusnom['nom']);
                                    }
                                } catch (PDOException $e) {
                                    echo 'Echec : ' . $e->getMessage();
                                }
                            }
                        } catch (PDOException $e) {
                            echo 'Echec : ' . $e->getMessage();
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Catégorie avec le - d'annonces :&nbsp;</td>
                    <td>
                        <?php
                        try {
                            $requete2 =  "SELECT categorie,count(categorie) as nbmax FROM annonce GROUP BY categorie ORDER by nbmax ASC LIMIT 0,1";
                            foreach ($connexion->query($requete2) as $camoins) {
                                try {
                                    $requete2nom =  "SELECT nom FROM categorie WHERE id =" . $camoins['categorie'] . ";";
                                    foreach ($connexion->query($requete2nom) as $camoinsnom) {
                                        echo ($camoinsnom['nom']);
                                    }
                                } catch (PDOException $e) {
                                    echo 'Echec : ' . $e->getMessage();
                                }
                            }
                        } catch (PDOException $e) {
                            echo 'Echec : ' . $e->getMessage();
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>L'annonce la plus ancienne :&nbsp;</td>
                    <td>
                        <?php
                        try {
                            
                            $requete3 =  "SELECT titre,date FROM annonce WHERE date=(SELECT min(date) FROM annonce);";
                            foreach ($connexion->query($requete3) as $row) {
                                echo ($row['titre'] . " / Date : " . $row['date']);
                            }
                        } catch (PDOException $e) {
                            echo 'Echec : ' . $e->getMessage();
                        }
                        ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>