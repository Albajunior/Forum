<?php
require('actions/db.php'); //nous d'acceder au session start et a la BD avec $bdd

//if bouton ajouter question
if (isset($_POST['validate'])) {

    //if bien rempli form
    if(!empty($_POST['contenu'])) {

        if (!isset($_SESSION['auth'])){

            echo " Veuiller vous connecter pour pour pariciper au forum ";
            //on reste sur la mm page

        }else{
            $contenu = nl2br(htmlspecialchars($_POST['contenu'])); //nl2br.. pour recuperer le textarea...
            $id_user = $_SESSION['id']; 
            $pseudo_user = $_SESSION['pseudo'];  
            $id_question = $questions_id;
            

            $addResponse = $bdd->prepare('INSERT INTO reponses(id_user, id_question, pseudo_user, contenu) 
                                        VALUES (?, ?, ?, ?)');
            $addResponse->execute(array($id_user, $id_question, $pseudo_user, $contenu));

           // $Successpublication = "Votre reponse a ete bien ajouter...";
        }

    }else {
       ?>
        <div class="alert alert-primary" role="alert">
            Veuiller vous connecter pour pour pariciper au forum<a href="login.php" class="alert-link">Connexion</a>. 
        </div>
       <?php 
    }
}

?>