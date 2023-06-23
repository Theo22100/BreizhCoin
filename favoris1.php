<?php  
    session_start();
	if ($_SESSION['rang']!="0"){
		header('Location: login.php');
	}

    $id = $annonce = $user = "";

    $servername = "localhost";
    $username = "root";
    $password_db = "root";
    $dbname = "cours";


            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password_db);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
    
                $stmt = $conn->prepare("INSERT INTO favoris (id,annonce,user) VALUES (:id, :annonce, :user)");

                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':annonce', $annonce);
                $stmt->bindParam(':user', $user);

    
    
                $id = $conn->insert_id;
                $annonce = $_GET['id'];
                $user = $_SESSION['id'];
                $stmt->execute();

    
                
    
            }
            catch (PDOException $e){
                echo 'Echec Contact: ' .$e->getMessage();
                header("Location: http://localhost/Projet/favoris.php?message=echoue");
            }
           header("Location: http://localhost/Projet/favoris.php?message=reussi");

    
    

?>