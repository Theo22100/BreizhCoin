

<?php
session_start();
if ($_SESSION['CONNECTE']!='YES'){
    header('Location: manager/login.php');
}



$age = $_POST["age"];
$id_modif=$_GET["num"];



$servername = "localhost";
$username = "root";
$password_db = "root";
$dbname = "cours";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password_db);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            $stmt = $conn -> prepare("
                                    UPDATE salarie 
                                    SET age = '$age' 
                                    WHERE id = '$id_modif';'");
            



            $stmt->execute();

            

        }
        catch (PDOException $e){
            echo 'Modification Echec: ' .$e->getMessage();
            $url="membre_modifier.php?message=modifechec&id=$id_modif";
            header("Location: $url");
        }
        $url= "membre_modifier.php?message=modifreussie&id=$id_modif";
        header("Location: $url");
    }


$conn = null;

?>


