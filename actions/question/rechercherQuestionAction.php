<?php
require('actions/db.php'); //nous d'acceder au session start et a la BD avec $bdd

//if bouton ajouter question
if (isset($_POST['searchbtn'])) {

    //if bien rempli form
    if(!empty($_POST['search'])) {

        $newtitle = htmlspecialchars($_POST['title']);
        $newdescription = htmlspecialchars($_POST['description']);
     

        $editQuestion = $bdd->prepare('UPDATE questions SET title = ?, description = ?, contenu = ? WHERE id = ?');
        $editQuestion->execute(array($newtitle, $newdescription, $newdescription,$idQuestionUrl));

        //idQuestionUrl est recuperer dans getInfoQuestion

        header('Location: mesquestions.php');


    } else {
        $ErrorMsg = "veuillez tout remplir...";
    }
}

?>