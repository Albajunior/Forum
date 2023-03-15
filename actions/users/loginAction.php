<?php
session_start();
require('actions/db.php');

//if bouton valider
if (isset($_POST['validate'])) {

    //if bien rempli form
    if(!empty($_POST['pseudo']) && !empty($_POST['password'])) {

        $pseudo = htmlspecialchars($_POST['pseudo']);;
        $password = htmlspecialchars($_POST['password']);

        $checkIfUserExist = $bdd->prepare('SELECT * FROM users WHERE pseudo = ?');
        $checkIfUserExist->execute(array($pseudo));

        //if user not exists
        if ($checkIfUserExist->rowCount() > 0) {
 
            //VIP : avec cette ligne on prend ttes les donnees recuperer par 
            //notre function $checkIfUserExist et on le met dans un tableau //($userinfo)

            $userInfos = $checkIfUserExist->fetch();  
         
            //password_verify va nous permettre de comparer le
            // password saisi et celui hasher dans la BD
            if (password_verify($password, $userInfos['password'])) {
             
                //Save/Authentifier infos du user avec Session Start
                $_SESSION['auth'] = true; //
                $_SESSION['id'] = $userInfos['id'];
                $_SESSION['pseudo'] = $userInfos['pseudo'];
                $_SESSION['nom'] = $userInfos['nom'];
                $_SESSION['prenom'] = $userInfos['prenom'];

                header('location: index.php');

            }else{
                $ErrorMsg = "Pseudo ou password incorrect";
            }

            //Go accueil
            header('location: index.php?');

         //if user existe   
        }else {
            $ErrorMsg = "Pseudo ou password incorrect";
        }


    } else {
        $ErrorMsg = "veuillez tout remplir...";
    }
}

?>