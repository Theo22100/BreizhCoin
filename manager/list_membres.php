<?php
include("inc/top.php");
session_start();
if ($_SESSION['CONNECTE']!='YES'){
    header('Location: login.php');
}

?>


            
            <!--  debut contenu -->
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Liste des Salariés</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Salariés</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                            <a href='membre_ajouter.php'>Ajouter un nouveau salarié</a>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Membres
                            </div>





                            <div class="card-body">
                                
                            <?php

                                    if ($_GET["message"]=="supechoue"){
                                        echo '<p style="color:red;">La suppression n\'a pas pu être effectué !</p>';
                                    }else if($_GET["message"]=="supreussie"){
                                        echo '<p style="color:green;">La supression a été effectué !</p>';
                                    }
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
