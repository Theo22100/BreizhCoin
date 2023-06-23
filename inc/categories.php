
<div class="main">
    <div class="sidebar">
        <div class="s-main">
            <div class="s_hdr">
                <h2>Catégories</h2>
            </div>
            <div class="text1-nav">
                <ul>
                    <?php
                    try{
                        $bdd = new PDO("mysql:host=localhost;dbname=cours", "root", "root");
                        $requete = $bdd->query("SELECT id,nom FROM categorie");
                        while ($resultat = $requete->fetch()) {
                            echo "<li><a href='categories.php?categorie=".$resultat['id']."'>" . $resultat['nom'] . "</a></li>";
                        }
                    }catch (PDOException $e){
                        echo 'Echec Connexion catégorie : ' .$e->getMessage();
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>