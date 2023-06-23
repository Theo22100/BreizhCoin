

<?php
session_start();
if ($_SESSION['CONNECTE'] != 'YES') {
    header('Location: login.php');
}



$lienImage = $_FILES['lienImage']['name'];
$id_modif = $_GET["num"];



$servername = "localhost";
$username = "root";
$password_db = "root";
$dbname = "cours";

if ($_SERVER["REQUEST_METHOD"] == "POST") {



    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password_db);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $requete = "SELECT lienImage FROM annonce WHERE id= '$id_modif'";


        foreach ($conn->query($requete) as $image) {
            $lien="../images/".$image['lienImage'];
            unlink($lien);
            $tmpName = $_FILES['lienImage']['tmp_name'];
            $name = $_FILES['lienImage']['name'];
            move_uploaded_file($tmpName, '../images/' . $name);

        }
    } catch (PDOException $e) {
        echo 'Suppression Image echec: ' . $e->getMessage();
    }

    try {
        $stmt = $conn->prepare("
                                    UPDATE annonce 
                                    SET lienImage = '$lienImage' 
                                    WHERE id = '$id_modif';'");




        $stmt->execute();

    } catch (PDOException $e) {
        echo 'Modification Echec: ' . $e->getMessage();
        $url = "annonce_modifier.php?message=modifechec&id=$id_modif";
        header("Location: $url");
    }

    $url = "annonce_modifier.php?message=modifreussie&id=$id_modif";
    header("Location: $url");
}


$conn = null;

?>


