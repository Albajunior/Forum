<?php

session_start();
if (!isset($_SESSION['auth'])){
    header('Location: ../../login.php');
}else{

require('../db.php'); //nous d'acceder au session start et a la BD avec $bdd


    if(isset($_GET['id']) AND !empty($_GET['id'])){

     $idQuestionUrl = $_GET['id'];

     //on verifie si l'id de l'url est vrai cad existe dans la Bd
     $checkIfQuestionExist = $bdd->prepare('SELECT id FROM questions WHERE id = ?');
     $checkIfQuestionExist->execute(array($idQuestionUrl));

     //si notre requete a trouver une question ou pas
     if($checkIfQuestionExist->rowCount() > 0){

        //l'id exite alors

        //on met les resultats de la req (id) dans $questions
        $questionsInfos = $checkIfQuestionExist->fetch();

        //on verifi si il a les droits de modifier
        if ($questionsInfos['id_user']= $_SESSION['id']) {

            $deleteQuestion = $bdd->prepare('DELETE FROM questions WHERE id = ?');
            $deleteQuestion->execute(array($idQuestionUrl));

            header('Location: ../../mesquestions.php');

        }else {
            //il a pas le droit de delete
            header('Location: ../../mesquestions.php');
        }

     }else {
         //l'id de la n'esixte pas
        header('Location: ../../mesquestions.php');
     }
    }else {
        //pas id dans url
        header('Location: ../../mesquestions.php');
    }
}

?>