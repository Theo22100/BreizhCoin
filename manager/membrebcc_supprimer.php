<?php
session_start();
if ($_SESSION['CONNECTE']!='YES'){
    header('Location: login.php');
}


                $serveur = "localhost";
                $login = "root";
                $pass = "root";
                
                try{
                    $connexion = new PDO("mysql:host=$serveur;dbname=cours", $login, $pass);
                    $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    $requetedel =  "DELETE FROM `membre` WHERE id= :id";

                    
                    
                    //Prepare la déclaration DELETE
                    $tempo= $connexion->prepare($requetedel);

                    $id=$_GET['id'];

                    //Lie la variable $id avec :id
                    $tempo->bindValue(':id',$id);

                    
                    $resultat= $tempo->execute();






                    
                }

                catch (PDOException $e){
                    echo 'Echec Effacer: ' .$e->getMessage();
                    header("Location: list_membrebcc.php?message=supechoue");
                }

                header("Location: list_membrebcc.php?message=supreussie");
               
                ?>