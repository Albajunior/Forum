<?php

session_start();
require('actions/db.php');


//if bouton valider
if (isset($_POST['validate'])) {

    //if bien rempli form
    if(!empty($_POST['pseudo']) && !empty($_POST['nom']) &&
       !empty($_POST['prenom']) && !empty($_POST['password'])) {

        if(isset($_FILES['my_image'])) {


            $pseudo = htmlspecialchars($_POST['pseudo']);
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $checkIfUserExist = $bdd->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
            $checkIfUserExist->execute(array($pseudo));

            //if user not exists
            if ($checkIfUserExist->rowCount() == 0) {
                
                $img_name = $_FILES['my_image']['name'];
                $img_size = $_FILES['my_image']['size'];
                $tmp_name = $_FILES['my_image']['tmp_name'];
                $error = $_FILES['my_image']['error'];
            
                if ($error === 0) {

                    if ($img_size > 125000) {
                        $em = "Sorry, your file is too large.";
                      //  header("Location: index.php?error=$em");
                    }else {
                        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                        $img_ex_lc = strtolower($img_ex);
            
                        $allowed_exs = array("jpg", "jpeg", "png"); 
            
                        if (in_array($img_ex_lc, $allowed_exs)) {
                            $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                            $img_upload_path = 'actions/users/img/'.$new_img_name;
                            move_uploaded_file($tmp_name, $img_upload_path);
            
                            $image_name = $new_img_name;
            
                            // Insert into Database

                            $insertUser = $bdd->prepare('INSERT INTO users(pseudo,nom, prenom, password, image_url ) VALUES (?, ?, ?, ?, ?)');
                            $insertUser->execute(array($pseudo, $nom, $prenom, $password, $image_name));

                            //if pour garder les donnees du User 
                            $getInfosuser = $bdd->prepare('SELECT id, pseudo, nom, prenom FROM users WHERE pseudo = ?');
                            $getInfosuser->execute(array($pseudo));

                            $userInfos = $getInfosuser->fetch();  //les donnes save dans un tableau

                            //Save/Authentifier infos du user avec Session Start
                            $_SESSION['auth'] = true; //
                            $_SESSION['id'] = $userInfos['id'];
                            $_SESSION['pseudo'] = $userInfos['pseudo'];
                            $_SESSION['nom'] = $userInfos['nom'];
                            $_SESSION['prenom'] = $userInfos['prenom'];

                            //Go accueil
                            header('location: index.php?');
                           
                        }else {
                            $ErrorMsg2 = "You can't upload files of this type";
                        }
                    }
                }else {
                    $ErrorMsg = "unknown error occurred!";
                    //header("Location: index.php?error=$em");
                }
                

            //if user existe   
            }else {
                $ErrorMsg = "l'utisateur existe deja";
            }
        }else{ $ErrorMsg = "veuillez choisir une iamge ";}
    
    } else {
        $ErrorMsg = "veuillez tout remplir...";
    }
}

?>