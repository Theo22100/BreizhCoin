

<?php

session_start();
if ($_SESSION['CONNECTE']!='YES'){
    header('Location: login.php');
}


$id = $nom = "";

$servername = "localhost";
$username = "root";
$password_db = "root";
$dbname = "cours";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password_db);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



            $stmt = $conn->prepare("INSERT INTO categorie (id,nom) VALUES (:id, :nom)");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nom', $nom);


            $id = $conn->insert_id;
            $nom = clean($_POST["nom"]);
            $stmt->execute();

            

        }
        catch (PDOException $e){
            echo 'Echec Ajout: ' .$e->getMessage();
             header("Location: categorie_ajouter.php?message=echoue");
        }
        header("Location: categorie_ajouter.php?message=reussie");
}

function clean($userInput) {
    $userInput = trim($userInput);//Enleve les espace
    $userInput = stripslashes($userInput);
    $userInput = htmlspecialchars($userInput);
    return $userInput;
}

$conn = null;
//header("Location: http://localhost/Projet/sinscrire.php?message=mdp");

?>


