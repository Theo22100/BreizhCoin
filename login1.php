<?php
            $password=$_POST['password'];
            $mail=$_POST['mail'];

            $servername = "localhost";
            $username = "root";
            $password_db = "root";
            $dbname = "cours";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
                try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password_db);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        
                    $sql = $conn -> prepare("SELECT id,prenom,nom,mail,rang FROM membre WHERE mail = '".$mail."' AND password = '".$password."';");
                    


                    $sql->execute(array());
                    



                    $num_of_rows = $sql->rowCount() ;




                    
                    if ($num_of_rows==1) {
                        // Regarde si la requete n'est pas vide si c'est le cas il connecte l'utilisateur
                        foreach($sql as $row) {
                            //pour prendre l'id de la personne
                            $donnees=$row['id'];
                            $donneesprenom=$row['prenom'];
                            $donneesnom=$row['nom'];
                            $donneesmail=$row['mail'];
                            $donneesrang=$row['rang']; //Pour savoir si la personne est bien connecté et éviter une confusion avec le panel admin
                        }
    
                        session_start();
                        //l'id de la personne est associé à sa connexion
                        $_SESSION['id']=$donnees;
                        $_SESSION['prenom']=$donneesprenom;
                        $_SESSION['nom']=$donneesnom;
                        $_SESSION['mail']=$donneesmail;
                        $_SESSION['rang']=$donneesrang;
                        header("Location: index.php");
                      } else {
                          //requete vide renvoit l'utilisateur sur son autre page
                        header("Location: login.php?message=echoue");
                      }


                    

                }
                catch (PDOException $e){
                    echo 'Echec Connexion : ' .$e->getMessage();
                }
            }



        ?>