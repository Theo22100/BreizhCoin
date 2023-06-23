

<?php

session_start();
if ($_SESSION['CONNECTE']!='YES'){
    header('Location: login.php');
}



$id = $titre = $description = $prix = $lienImage = $categorie = $date = "";

$servername = "localhost";
$username = "root";
$password_db = "root";
$dbname = "cours";
var_dump($_FILES);
//var_dump($_POST);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password_db);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



            $stmt = $conn->prepare("INSERT INTO annonce (id,titre,description,prix,lienImage,categorie,date) VALUES (:id, :titre, :description, :prix, :lienImage, :categorie, :date)");
            
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':titre', $titre);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':prix', $prix);
            $stmt->bindParam(':lienImage', $lienImage);
            $stmt->bindParam(':categorie', $categorie);
            $stmt->bindParam(':date', $date);



            $id = $conn->insert_id;
            $titre = clean($_POST["titre"]);
            $description = clean($_POST["description"]);
            $prix = clean($_POST["prix"]);
            $lienImage = $_FILES['lienImage']['name'];
            $categorie = $_POST["categorie"];
            $date = date('y-m-d');
            $stmt->execute();



            

        }
        catch (PDOException $e){
            echo 'Echec Ajout: ' .$e->getMessage();
            header("Location: annonce_ajouter.php?message=echoue");
        }


        $tmpName = $_FILES['lienImage']['tmp_name'];
        $name = $_FILES['lienImage']['name'];
        move_uploaded_file($tmpName, '../images/'.$name);
        


        header("Location: annonce_ajouter.php?message=reussie");

}

function clean($userInput) {
    $userInput = trim($userInput);//Enleve les espace
    $userInput = stripslashes($userInput);
    $userInput = htmlspecialchars($userInput);
    return $userInput;
}

$conn = null;

?>


