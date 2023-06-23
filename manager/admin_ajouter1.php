

<?php

session_start();
if ($_SESSION['CONNECTE']!='YES'){
    header('Location: login.php');
}



$id = $nom = $prenom = $password = $mail = "";

$servername = "localhost";
$username = "root";
$password_db = "root";
$dbname = "cours";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["password"]==$_POST["confirm_password"]){
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password_db);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



            $stmt = $conn->prepare("INSERT INTO admin (id,nom,prenom,password,mail) VALUES (:id, :prenom, :nom, :password, :mail)");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':mail', $mail);



            $id = $conn->insert_id;
            $prenom = clean($_POST["prenom"]);
            $nom = clean($_POST["nom"]);
            $password = clean($_POST["password"]);
            $mail = clean($_POST["mail"]);
            $stmt->execute();

            

        }
        catch (PDOException $e){
            echo 'Echec Ajout: ' .$e->getMessage();
             header("Location: admin_ajouter.php?message=echoue");
        }
        header("Location: admin_ajouter.php?message=reussie");
    }else{
        header("Location: admin_ajouter.php?message=mdp");
    }
}

function clean($userInput) {
    $userInput = trim($userInput);//Enleve les espace
    $userInput = stripslashes($userInput);
    $userInput = htmlspecialchars($userInput);
    return $userInput;
}

$conn = null;

?>


