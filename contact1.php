<?php  
    session_start();

    $id = $nom = $mail = $telephone = $msg = "";

    $servername = "localhost";
    $username = "root";
    $password_db = "root";
    $dbname = "cours";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password_db);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
    
                $stmt = $conn->prepare("INSERT INTO contact (id,nom,mail,telephone,msg) VALUES (:id, :nom, :mail, :telephone, :msg)");

                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':nom', $nom);
                $stmt->bindParam(':mail', $mail);
                $stmt->bindParam(':telephone', $telephone);
                $stmt->bindParam(':msg', $msg);
    
    
                $id = $conn->insert_id;
                $nom = clean($_POST["userName"]);
                $mail = clean($_POST['userEmail']);
                $telephone = clean($_POST["userPhone"]);
                $msg = clean($_POST['userMsg']);
                $stmt->execute();
    
                
    
            }
            catch (PDOException $e){
                echo 'Echec Contact: ' .$e->getMessage();
                 header("Location: contact.php?message=echoue");
            }
            header("Location: contact.php?message=reussi");
        }
    
    function clean($userInput) {
        $userInput = trim($userInput);//Enleve les espace
        $userInput = stripslashes($userInput);
        $userInput = htmlspecialchars($userInput);
        return $userInput;
    }
    

?>