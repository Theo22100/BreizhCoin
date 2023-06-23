<?php

session_start();
if ($_SESSION['rang']!="0") {
    header('Location: login.php');
}

$servername = "localhost";
$username = "root";
$password_db = "root";
$dbname = "cours";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password_db);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $id_user = $_SESSION['id'];



    $sql = $conn->prepare("SELECT id,annonce FROM favoris WHERE user = '" . $id_user . "';");



    $sql->execute(array());




    $num_of_rows = $sql->rowCount();
    echo ("<html><body onload='window.print()'>");
    echo ("<h2> Liste de vos annonces favorites</h2>");

    foreach ($sql as $row) {
        //pour prendre l'id de la annonce
        $donneesannonce = $row['annonce'];
        try {
            //$sql2 = $conn -> prepare("SELECT id,titre,description,prix,lienImage FROM annonce WHERE id = '".$donneesannonce."';");
            $annonce = $conn->query("SELECT * FROM annonce WHERE id = '" . $donneesannonce . "';")->fetch();
            //window.print pour imprimer

            echo ("<div class='ser-grid-list'>");
            echo ("<h5>" . $annonce['titre'] . "</h5>");
            echo ("<img src='images/" . $annonce['lienImage'] . "' alt='" . $annonce['titre'] . "' width='auto' height='100px'/>");
            echo ("<p>" . $annonce['description'] . "</p>");
            echo ("<p> Prix : " . $annonce['prix'] . " € </p>");
            echo ("</div>");
        } catch (PDOException $e) {
            echo 'Echec Connexion : ' . $e->getMessage();
        }
    }
} catch (PDOException $e) {
    echo 'Echec Connexion : ' . $e->getMessage();
}
echo ('</body>');
echo ('</html>');


?>