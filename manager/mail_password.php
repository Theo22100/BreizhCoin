
    <?php

    $mail=$_POST['mail'];
    //mail fictif car serveur local, donc pas possibilité d'envoyer de mail
    $retour = mail($mail, 'Envoi depuis la page Contact', 'Lien password : <lien>', 'From: BreizhCoinCoin');

    if ($retour){
        header("Location: password.php?message=reussi");
       echo("réussite");
    }else{
        header("Location: password.php?message=echoue");
    }


    
    ?>
</body>