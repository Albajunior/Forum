<?php
require('actions/db.php'); //nous d'acceder au session start et a la BD avec $bdd

//if bouton ajouter question
if (isset($_POST['validate'])) {

    //if bien rempli form
    if(!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['contenu'])) {

        $title = htmlspecialchars($_POST['title']);
        $description = htmlspecialchars($_POST['description']);
        $contenu = nl2br(htmlspecialchars($_POST['contenu'])); //nl2br.. pour recuperer le textarea...
        $id_user = $_SESSION['id']; 
        $pseudo_user = $_SESSION['pseudo'];  
        $datepub = date('d/m/Y');
        

        $addQuestion = $bdd->prepare('INSERT INTO questions(id_user,title,description,contenu, pseudo_user, datepub) 
                                      VALUES (?, ?, ?, ?, ?, ?)');
        $addQuestion->execute(array($id_user, $title, $description, $contenu, $pseudo_user, $datepub));

        $Successpublication = "Votre question a ete bien ajouter...";


    } else {
        $ErrorMsg = "veuillez tout remplir...";
    }
}

?>