



<?php

session_start();
if ($_SESSION['CONNECTE']!='YES'){
    header('Location: login.php');
}



$id = $nom = $position = $startdate = $office = $age = $salary = "";

$servername = "localhost";
$username = "root";
$password_db = "root";
$dbname = "cours";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password_db);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



            $stmt = $conn->prepare("INSERT INTO salarie (id,nom,position,startdate,office,age,salary) VALUES (:id, :nom, :position, :startdate, :office, :age, :salary)");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':position', $position);
            $stmt->bindParam(':startdate', $startdate);
            $stmt->bindParam(':office', $office);
            $stmt->bindParam(':age', $age);
            $stmt->bindParam(':salary', $salary);



            $id = $conn->insert_id;
            $nom = clean($_POST["nom"]);
            $position = clean($_POST["position"]);
            $startdate = $_POST["startdate"];
            $office = clean($_POST["office"]);
            $age = $_POST["age"];
            $salary = $_POST["salary"];
            $stmt->execute();

            

        }
        catch (PDOException $e){
            echo 'Echec Ajout: ' .$e->getMessage();
             header("Location: membre_ajouter.php?message=echoue");
        }
        header("Location: membre_ajouter.php?message=reussie");
    }


function clean($userInput) {
    $userInput = trim($userInput);//Enleve les espace
    $userInput = stripslashes($userInput);
    $userInput = htmlspecialchars($userInput);
    return $userInput;
}

$conn = null;

?>


