

<?php
session_start();
if ($_SESSION['CONNECTE']!='YES'){
    header('login.php');
}



$categorie = $_POST["categorie"];
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
                                    UPDATE annonce 
                                    SET categorie = '$categorie' 
                                    WHERE id = '$id_modif';'");
            



            $stmt->execute();

            

        }
        catch (PDOException $e){
            echo 'Modification Echec: ' .$e->getMessage();
            $url="annonce_modifier.php?message=modifechec&id=$id_modif";
            header("Location: $url");
        }
        $url= "annonce_modifier.php?message=modifreussie&id=$id_modif";
        header("Location: $url");
    }


$conn = null;

?>


