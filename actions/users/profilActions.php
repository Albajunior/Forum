<?php
session_start(); //on vas utiliser navbar, qui depend du session pr login et logout
require('actions/db.php');  //nous d'acceder au session start et a la BD avec $bdd

    if(isset($_GET['id']) AND !empty($_GET['id'])){

     $idUser = $_GET['id'];

     //on verifie si l'id de l'url est vrai cad existe dans la Bd
     $checkIfUserExist = $bdd->prepare('SELECT * FROM users WHERE id = ?');
     $checkIfUserExist->execute(array($idUser));

     //si notre requete a trouver une question ou pas
     if($checkIfUserExist->rowCount() > 0){
        //l'id exite alors

        //on met les resultats de la req (id) dans $questions
        $userInfos = $checkIfUserExist->fetch();

        //on stockles donnees du user selectionner dans des variables
        $user_pseudo = $userInfos['pseudo'];
        $user_nom = $userInfos['nom'];
        $user_prenom = $userInfos['prenom'];
        $user_images = $userInfos['image_url'];

        //maintenant on recupere les questions du user selectionner
        $checkIfQuestionUser = $bdd->prepare('SELECT * FROM questions WHERE id_user = ? ORDER BY id DESC');
        $checkIfQuestionUser->execute(array($idUser));

        }else {
           //header('Location: ../index.php');
           $errrMsg = "aucun user trouvrer avec cette id ";
        }

    }else {
        $errrMsg = "aucun user trouver ";
    }

?>