<?php
session_start();
if ($_SESSION['rang']!="0") {
    header('Location: login.php');
}


$serveur = "localhost";
$login = "root";
$pass = "root";

try {
    $connexion = new PDO("mysql:host=$serveur;dbname=cours", $login, $pass);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $requetedel =  "DELETE FROM `favoris` WHERE user = :user AND annonce = :annonce";



    //Prepare la déclaration DELETE
    $tempo = $connexion->prepare($requetedel);

    $user = $_SESSION['id'];
    $annonce = $_GET['idfav'];


    //Lie la variable $id avec :id
    $tempo->bindValue(':user', $user);
    $tempo->bindValue(':annonce', $annonce);


    $resultat = $tempo->execute();
} catch (PDOException $e) {
    echo 'Echec Effacer: ' . $e->getMessage();
    header("Location: http://localhost/Projet/favoris.php?message=supechoue");
}

header("Location: http://localhost/Projet/favoris.php?message=supreussie");
?>
