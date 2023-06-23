

<?php
session_start();

$id = $prenom = $nom = $mail = $password = "";

$servername = "localhost";
$username = "root";
$password_db = "root";
$dbname = "cours";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["password"]==$_POST["confirm_password"]){
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password_db);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



            $stmt = $conn->prepare("INSERT INTO admin (id,nom,prenom,password,mail) VALUES (:id, :nom, :prenom, :password, :mail)");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':mail', $mail);



            $id = $conn->insert_id;
            $nom = clean($_POST["nom"]);
            $prenom = clean($_POST["prenom"]);
            $mail = $_POST["mail"];
            $password = $_POST["password"];
            $stmt->execute();

            

        }
        catch (PDOException $e){
            echo 'Echec Ajout: ' .$e->getMessage();
            header("Location: register.php?message=echoue");
            echo("echec");
        }
        header("Location: register.php?message=reussie");
        echo("réussite ?");
    }else{
        header("Location: register.php?message=mdp");
        echo ("mdp");
    }
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




