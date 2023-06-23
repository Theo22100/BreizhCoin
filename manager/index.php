<?php
include("inc/top.php");
session_start();
if ($_SESSION['CONNECTE']!='YES'){
    header('Location: login.php');
}
$servername = "localhost";
$username = "root";
$password_db = "root";
$dbname = "cours";
?>


            
            <!--  debut contenu -->
            <html>
                <head>
                    <meta charset=”utf-8″>
                </head>
	            <body>
                    <main>
                        <div class="container-fluid px-4">
                            <h1 class="mt-4">Dashboard</h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                            <div class="row">
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-primary text-white mb-4">
                                        <div class="card-body">Admins :
                                        <!-- Requete pour avoir le nombre d'admins-->
                                        <?php

                                             try {
                                                 $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password_db);
                                                 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                             
                             
                                     
                                                 $sql = $conn -> prepare("SELECT id FROM admin;");
                                                 
                             
                             
                                                 $sql->execute(array());
                                                 
                             
                             
                             
                                                 $num_of_rowsad = $sql->rowCount() ;
                                             }
                                             catch (PDOException $e){
                                                 echo 'Echec Connexion : ' .$e->getMessage();
                                             }

                                             echo $num_of_rowsad;

                                    ?>
                                    <!--  Fin requete admin -->
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="list_admins.php">En savoir plus</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-primary text-white mb-4">
                                        <div class="card-body">Salariés : 
                                            
                                         <!-- Requete pour avoir le nombre de salariés-->
                                         <?php
                                             try {
                                                 $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password_db);
                                                 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                             
                                                 $sql = $conn -> prepare("SELECT id FROM salarie;");
                                                 $sql->execute(array());
                                                 
                                                 $num_of_rowssalarie = $sql->rowCount() ;
                                             }
                                             catch (PDOException $e){
                                                 echo 'Echec Connexion : ' .$e->getMessage();
                                             }

                                             echo $num_of_rowssalarie;                                   
                                        ?>
                                        <!--  Fin requete salariés-->
                                        
                                        
                                        
                                        
                                        
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="list_membres.php">En savoir plus</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-primary text-white mb-4">
                                        <div class="card-body">Membres BCC : 

                                        <!-- Requete pour avoir le nombre de membres bcc-->
                                        <?php
                                             try {
                                                 $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password_db);
                                                 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                             
                                                 $sql = $conn -> prepare("SELECT id FROM membre;");
                                                 $sql->execute(array());
                                                 
                                                 $num_of_rowsmembre = $sql->rowCount() ;
                                             }
                                             catch (PDOException $e){
                                                 echo 'Echec Connexion : ' .$e->getMessage();
                                             }

                                             echo $num_of_rowsmembre;                                    
                                        ?>
                                        <!--  Fin requete membres bcc -->

                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="list_membrebcc.php">En savoir plus</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-warning text-white mb-4">
                                        <div class="card-body">Catégories : 
                                    <!-- Requete pour avoir le nombre de membres bcc-->
                                    <?php
                                             try {
                                                 $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password_db);
                                                 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                             
                                                 $sql = $conn -> prepare("SELECT id FROM categorie;");
                                                 $sql->execute(array());
                                                 
                                                 $num_of_rowscategorie = $sql->rowCount() ;
                                             }
                                             catch (PDOException $e){
                                                 echo 'Echec Connexion : ' .$e->getMessage();
                                             }

                                             echo $num_of_rowscategorie;                                  
                                        ?>
                                        <!--  Fin requete membres bcc -->





                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="list_categories.php">En savoir plus</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-success text-white mb-4">
                                        <div class="card-body">Annonces : 

                                        <!-- Requete pour avoir le nombre d'annonces-->
                                        <?php

                                             try {
                                                 $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password_db);
                                                 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                             
                             
                                     
                                                 $sql = $conn -> prepare("SELECT id FROM annonce;");
                                                 
                             
                             
                                                 $sql->execute(array());
                                                 
                             
                             
                             
                                                 $num_of_rowsan = $sql->rowCount() ;
                                             }
                                             catch (PDOException $e){
                                                 echo 'Echec Connexion : ' .$e->getMessage();
                                             }

                                             echo $num_of_rowsan;

                                    ?>
                                    <!--  Fin requete annonces -->
















                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="list_annonces.php">En savoir plus</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-danger text-white mb-4">
                                        <div class="card-body">Contact : 



                                         <!-- Requete pour avoir le nombre de msg dans contact-->
                                        <?php

                                             try {
                                                 $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password_db);
                                                 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                             
                             
                                     
                                                 $sql = $conn -> prepare("SELECT id FROM contact;");
                                                 
                             
                             
                                                 $sql->execute(array());
                                                 
                             
                             
                             
                                                 $num_of_rowscon = $sql->rowCount() ;
                                             }
                                             catch (PDOException $e){
                                                 echo 'Echec Connexion : ' .$e->getMessage();
                                             }

                                             echo $num_of_rowscon;

                                    ?>
                                    <!--  Fin requete msg contact -->















                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="list_contacts.php">En savoir plus</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                
                                
                                
                            </div>
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    Salariés enregistrés
                                </div>
                                <div class="card-body">
                                    <?php
                                        include("list_membres1.php");
                                    ?>
                                </div>
                            </div>
                        </div>
                    </main>

                <!-- fin contenu -->
               
               
<?php
include("inc/bottom.php");
?>
</body>
</html>