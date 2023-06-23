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


        
                    $sql = $conn -> prepare("SELECT id,nom,prenom,mail FROM admin WHERE mail = '".$mail."' AND password = '".$password."';");
                    


                    $sql->execute(array());
                    



                    $num_of_rows = $sql->rowCount() ;




                    
                    if ($num_of_rows==1) {
                        // Regarde si la requete n'est pas vide si c'est le cas il connecte l'utilisateur
                        foreach($sql as $row) {
                            //pour prendre l'id de la personne
                            $donnees=$row['id'];
                            $donneesnom=$row['nom'];
                            $donneesprenom=$row['prenom'];
                            $donneesmail=$row['mail'];

                        }
    
                        session_start();
                        //l'id de la personne est associé à sa connexion
                        $_SESSION['id']=$donnees;
                        $_SESSION['CONNECTE']='YES';
                        $_SESSION['prenom']=$donneesnom;
                        $_SESSION['nom']=$donneesprenom;
                        $_SESSION['mail']=$donneesmail;
                        header("Location: index.php");
                        echo("réussite");
                      } else {
                          //requete vide renvoit l'utilisateur sur son autre page
                          echo("echec");
                        header("Location: login.php?message=echoue");
                      }


                    

                }
                catch (PDOException $e){
                    echo 'Echec Connexion : ' .$e->getMessage();
                }
            }



        ?>