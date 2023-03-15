<?php
session_start(); //on vas utiliser navbar, qui depend du session pr login et logout
require('actions/db.php');  //nous d'acceder au session start et a la BD avec $bdd

    if(isset($_GET['id']) AND !empty($_GET['id'])){

     $idQuestionUrl = $_GET['id'];

     //on verifie si l'id de l'url est vrai cad existe dans la Bd
     $checkIfQuestionExist = $bdd->prepare('SELECT *  FROM questions WHERE id = ?');
     $checkIfQuestionExist->execute(array($idQuestionUrl));

     //si notre requete a trouver une question ou pas
     if($checkIfQuestionExist->rowCount() > 0){
        //l'id exite alors

        //on met les resultats de la req (id) dans $questions
        $questionsInfos = $checkIfQuestionExist->fetch();

        //on dec
        $questions_id = $questionsInfos['id'];
        $questions_title = $questionsInfos['title'];
        $questions_content = $questionsInfos['contenu'];
        $questions_pseudo = $questionsInfos['pseudo_user'];
        $questions_date = $questionsInfos['datepub'];

        }else {
            //il a pas le droit de delete
           //header('Location: ../index.php');
           $errrMsg = "existe pas";
        }

    }else {
        $errrMsg = "existe pas";
    }

?>