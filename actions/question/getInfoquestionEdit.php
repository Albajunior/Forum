<?php
require('actions/db.php'); 

//on part chercher l'id dans l'url avec get
if(isset($_GET['id']) AND !empty($_GET['id'])){

    $idQuestionUrl = $_GET['id'];

    //on verifie si l'id de l'url est vrai cad existe dans la Bd
    $checkIfQuestionExist = $bdd->prepare('SELECT * FROM questions WHERE id = ?');
    $checkIfQuestionExist->execute(array($idQuestionUrl));

    //si notre requete a trouver une question ou pas
    if($checkIfQuestionExist->rowCount() > 0){

        //l'id exite alors

        //on met les resultats de la req (id, et iduser) dans $questions
        $questionsInfos = $checkIfQuestionExist->fetch();
        //on verifi si il a les droits de modifier
        if ($questionsInfos['id_user']= $_SESSION['id']) {

            $question_title = $questionsInfos['title'];
            $question_description = $questionsInfos['description'];
            $question_contenu = $questionsInfos['contenu'];
            
            $question_contenu = str_replace( '<br />', '', $question_contenu );
            //on use str_replace car contenu est un textarea, donc il peut contenir de saut d ligne <br /
            //et on remplace c br par du vidde ' '

            //VIP : dans notre page on toujours use la derniere variable decarer pur notre verification
            //like $question_contenu
        }else {
            $ErrorMsg = "Vous n'etes pas l'auteur de cette question, sorry u can't edit";
        }

    }else {
        $ErrorMsg = 'Aucune question trouver';
    }

}else {
    $ErrorMsg = 'Aucune question trouver';
}
?>