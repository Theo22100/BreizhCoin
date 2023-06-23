

<?php

session_start();
if ($_SESSION['CONNECTE']!='YES'){
    header('Location: login.php');
}


$id = $prenom = $nom = $mail = $password = $news = "";

$servername = "localhost";
$username = "root";
$password_db = "root";
$dbname = "cours";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password_db);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



            $stmt = $conn->prepare("INSERT INTO membre (id,prenom,nom,mail,password,news,rang) VALUES (:id, :prenom, :nom, :mail, :password, :news, :rang)");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':mail', $mail);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':news', $news);
            $stmt->bindParam(':rang', $rang);



            $id = $conn->insert_id;
            $prenom = clean($_POST["prenom"]);
            $nom = clean($_POST["nom"]);
            $mail = clean($_POST["mail"]);
            $password = clean($_POST["password"]);
            $news = $_POST["news"];
            $rang = "0";
            $stmt->execute();

            

        }
        catch (PDOException $e){
            echo 'Echec Ajout: ' .$e->getMessage();
             header("Location: membrebcc_ajouter.php?message=echoue");
        }
        header("Location: membrebcc_ajouter.php?message=reussie");
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


