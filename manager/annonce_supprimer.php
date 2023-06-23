<?php
session_start();
if ($_SESSION['CONNECTE'] != 'YES') {
    header('Location: login.php');
}

$serveur = "localhost";
$login = "root";
$pass = "root";
//SUPPRIMER LA PHOTO DANS LE FICHIER IMAGE
try {
    $connexion = new PDO("mysql:host=$serveur;dbname=cours", $login, $pass);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $idm=$_GET['id'];

    $requete = "SELECT lienImage FROM annonce WHERE id= $idm";

    foreach ($connexion->query($requete) as $image) {
        //Permet de supprimer la photo
        $lien="../images/".$image['lienImage'];
        unlink($lien);
    }

}
    catch (PDOException $f) {
        echo 'Echec Suppression Image: ' . $f->getMessage();
    }
/////////////////////////////////////

//SUPPRIMER L'ANNONCE DANS LA TABLE ANNONCE//
try {


    $requetedel =  "DELETE FROM `annonce` WHERE id= :id";

    //Prepare la déclaration DELETE
    $tempo = $connexion->prepare($requetedel);

    

    //Lie la variable $id avec :id
    $tempo->bindValue(':id', $_GET['id']);


    $resultat = $tempo->execute();

} catch (PDOException $e) {
    echo 'Echec Effacer: ' . $e->getMessage();
    header("Location: list_annonces.php?message=supechoue");
}

header("Location: list_annonces.php?message=supreussie");
