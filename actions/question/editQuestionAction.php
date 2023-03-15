<?php
require('actions/db.php'); //nous d'acceder au session start et a la BD avec $bdd

//if bouton ajouter question
if (isset($_POST['validate'])) {

    //if bien rempli form
    if(!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['contenu'])) {

        $newtitle = htmlspecialchars($_POST['title']);
        $newdescription = htmlspecialchars($_POST['description']);
        $newcontenu = nl2br(htmlspecialchars($_POST['contenu'])); //nl2br.. pour recuperer le textarea...
        $id_user = $_SESSION['id']; 
        $pseudo_user = $_SESSION['pseudo'];  
        $datepub = date('d/m/Y');
        

        $editQuestion = $bdd->prepare('UPDATE questions SET title = ?, description = ?, contenu = ? WHERE id = ?');
        $editQuestion->execute(array($newtitle, $newdescription, $newdescription,$idQuestionUrl));

        //idQuestionUrl est recuperer dans getInfoQuestion

        header('Location: mesquestions.php');


    } else {
        $ErrorMsg = "veuillez tout remplir...";
    }
}

?>