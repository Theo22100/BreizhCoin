

<?php
session_start();
if ($_SESSION['rang']!="0"){
    header('Location: http://localhost/Projet/index.php');
}

$mail = $_POST["mail"];
$_SESSION['mail']=$mail;

$servername = "localhost";
$username = "root";
$password_db = "root";
$dbname = "cours";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password_db);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            $stmt = $conn -> prepare("
                                    UPDATE membre 
                                    SET mail = '$mail' 
                                    WHERE id = '$_SESSION[id]';'");
            




            $stmt->execute();

            

        }
        catch (PDOException $e){
            echo 'Echec Ajout: ' .$e->getMessage();
            header("Location: compte.php?message=mailechoue");
        }
        header("Location: compte.php?message=mailreussi");
}


$conn = null;

?>


