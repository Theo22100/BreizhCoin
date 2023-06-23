

<?php


$id = $prenom = $nom = $mail = $password = $news = $rang = "";

$servername = "localhost";
$username = "root";
$password_db = "root";
$dbname = "cours";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["password"]==$_POST["confirm_password"]){
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
            $mail = $_POST["mail"];
            $password = $_POST["password"];
            $news = $_POST["news"];
            $rang = "0";
            $stmt->execute();

            

        }
        catch (PDOException $e){
            echo 'Echec Ajout: ' .$e->getMessage();
             header("Location: sinscrire.php?message=echoue");
        }
        header("Location: sinscrire.php?message=reussie");
    }else{
        header("Location: sinscrire.php?message=mdp");
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


